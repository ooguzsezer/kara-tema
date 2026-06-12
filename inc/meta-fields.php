<?php

/* ── Meta box kayıt ──────────────────────────────────── */
function tepetrafik_meta_box_register() {
    add_meta_box(
        'tepetrafik_seo',
        'SEO Ayarları',
        'tepetrafik_meta_box_render',
        [ 'post', 'page' ],
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'tepetrafik_meta_box_register' );


/* ── Meta box HTML ───────────────────────────────────── */
function tepetrafik_meta_box_render( $post ) {
    wp_nonce_field( 'tepetrafik_seo_save', 'tepetrafik_seo_nonce' );

    $seo_title = get_post_meta( $post->ID, '_tp_seo_title',       true );
    $seo_desc  = get_post_meta( $post->ID, '_tp_seo_description', true );
    $og_image  = get_post_meta( $post->ID, '_tp_og_image',        true );
    $noindex   = get_post_meta( $post->ID, '_tp_noindex',         true );
    ?>
    <style>
    .tp-seo-box { display:grid; gap:1rem; padding:0.5rem 0; }
    .tp-seo-box label { font-weight:600; font-size:13px; display:block; margin-bottom:4px; }
    .tp-seo-box input[type=text],
    .tp-seo-box textarea { width:100%; padding:6px 10px; border:1px solid #ddd; border-radius:3px; font-size:13px; }
    .tp-seo-box textarea { height:70px; resize:vertical; }
    .tp-seo-counter { font-size:11px; color:#888; margin-top:3px; }
    .tp-seo-counter.warn { color:#c0392b; }
    .tp-seo-preview { background:#f9f9f9; border:1px solid #e5e5e5; border-radius:4px; padding:12px; margin-top:0.5rem; }
    .tp-seo-preview .prev-title { color:#1a0dab; font-size:18px; font-family:arial,sans-serif; }
    .tp-seo-preview .prev-url   { color:#006621; font-size:13px; font-family:arial,sans-serif; }
    .tp-seo-preview .prev-desc  { color:#545454; font-size:13px; font-family:arial,sans-serif; }
    </style>

    <div class="tp-seo-box">

      <div>
        <label>SEO Başlığı <span style="font-weight:400;color:#888;">(boş bırakılırsa otomatik oluşur)</span></label>
        <input type="text" name="tp_seo_title" id="tp_seo_title"
               value="<?php echo esc_attr($seo_title); ?>"
               placeholder="<?php echo esc_attr(get_the_title($post->ID) . ' – ' . get_bloginfo('name')); ?>"
               maxlength="70" oninput="tpCount(this,'tp_title_count',50,60)">
        <p class="tp-seo-counter" id="tp_title_count"><?php echo mb_strlen($seo_title); ?>/70 karakter (ideal: 50–60)</p>
      </div>

      <div>
        <label>Meta Açıklaması <span style="font-weight:400;color:#888;">(boş bırakılırsa excerpt kullanılır)</span></label>
        <textarea name="tp_seo_description" id="tp_seo_description"
                  maxlength="160"
                  oninput="tpCount(this,'tp_desc_count',120,155)"
                  placeholder="Bu sayfa hakkında kısa bir açıklama yazın (120–155 karakter ideal)..."><?php echo esc_textarea($seo_desc); ?></textarea>
        <p class="tp-seo-counter" id="tp_desc_count"><?php echo mb_strlen($seo_desc); ?>/160 karakter (ideal: 120–155)</p>
      </div>

      <div>
        <label>OG Paylaşım Görseli URL'si <span style="font-weight:400;color:#888;">(1200×630 önerilir — boş bırakılırsa öne çıkan görsel veya varsayılan kullanılır)</span></label>
        <input type="text" name="tp_og_image" value="<?php echo esc_attr($og_image); ?>"
               placeholder="https://siteniz.com/wp-content/uploads/gorsel.jpg">
      </div>

      <div>
        <label>
          <input type="checkbox" name="tp_noindex" value="1" <?php checked($noindex, '1'); ?>>
          Bu sayfayı Google'dan gizle (noindex)
        </label>
      </div>

      <div class="tp-seo-preview">
        <p style="font-size:11px;color:#888;margin-bottom:8px;font-weight:600;">GOOGLE ÖNİZLEME</p>
        <div class="prev-title" id="prev_title"><?php echo esc_html($seo_title ?: get_the_title($post->ID) . ' – ' . get_bloginfo('name')); ?></div>
        <div class="prev-url"><?php echo esc_url(get_permalink($post->ID)); ?></div>
        <div class="prev-desc" id="prev_desc"><?php echo esc_html($seo_desc ?: wp_trim_words(get_the_excerpt($post->ID), 25)); ?></div>
      </div>

    </div>

    <script>
    function tpCount(el, counterId, min, max) {
      var len = el.value.length;
      var c = document.getElementById(counterId);
      c.textContent = len + '/' + el.maxLength + ' karakter (ideal: ' + min + '–' + max + ')';
      c.className = 'tp-seo-counter' + (len < min || len > max ? ' warn' : '');
    }

    document.getElementById('tp_seo_title').addEventListener('input', function() {
      document.getElementById('prev_title').textContent = this.value ||
        '<?php echo esc_js(get_the_title($post->ID) . ' – ' . get_bloginfo('name')); ?>';
    });
    document.getElementById('tp_seo_description').addEventListener('input', function() {
      document.getElementById('prev_desc').textContent = this.value || '';
    });
    </script>
    <?php
}


/* ── Kaydet ──────────────────────────────────────────── */
function tepetrafik_meta_box_save( $post_id ) {
    if ( ! isset( $_POST['tepetrafik_seo_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['tepetrafik_seo_nonce'], 'tepetrafik_save' ) ) return;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [
        'tp_seo_title'       => '_tp_seo_title',
        'tp_seo_description' => '_tp_seo_description',
        'tp_og_image'        => '_tp_og_image',
    ];

    foreach ( $fields as $post_key => $meta_key ) {
        $val = isset( $_POST[$post_key] ) ? sanitize_text_field( $_POST[$post_key] ) : '';
        update_post_meta( $post_id, $meta_key, $val );
    }

    $noindex = isset( $_POST['tp_noindex'] ) ? '1' : '';
    update_post_meta( $post_id, '_tp_noindex', $noindex );
}
add_action( 'save_post', 'tepetrafik_meta_box_save' );


/* ── seo.php'deki meta_tags fonksiyonunu meta field'larla güçlendir ── */
add_filter( 'tepetrafik_seo_title', function( $title ) {
    if ( is_singular() ) {
        $custom = get_post_meta( get_the_ID(), '_tp_seo_title', true );
        if ( $custom ) return $custom;
    }
    return $title;
} );

add_filter( 'tepetrafik_seo_desc', function( $desc ) {
    if ( is_singular() ) {
        $custom = get_post_meta( get_the_ID(), '_tp_seo_description', true );
        if ( $custom ) return $custom;
    }
    return $desc;
} );

add_filter( 'tepetrafik_og_image', function( $img ) {
    if ( is_singular() ) {
        $custom = get_post_meta( get_the_ID(), '_tp_og_image', true );
        if ( $custom ) return esc_url( $custom );
    }
    return $img;
} );

add_filter( 'tepetrafik_robots', function( $robots ) {
    if ( is_singular() ) {
        $noindex = get_post_meta( get_the_ID(), '_tp_noindex', true );
        if ( $noindex ) return 'noindex, nofollow';
    }
    return $robots;
} );
