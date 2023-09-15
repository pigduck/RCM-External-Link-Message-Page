window.addEventListener('load', function() {
    var rcm_eump = document.getElementById('accordion-section-rcm-external-link-message-page');
//addeventlistener to click
    rcm_eump.addEventListener('click', function() {
        //es6 Fetch wp_ajax_rcm_eump_ajax
        var formData = new FormData();

        formData.append( 'action', 'rcm_get_eump' );

        var url = '/wp-admin/admin-ajax.php';
        fetch( url, {
            method: 'POST',
            body: formData,
        } )
            .then( res => res.text() )
            .then(function (url){
                if (url.indexOf("?") != -1) {
                    const urlParams = new URLSearchParams(url);
                    urlParams.append('url', 'https://rottencodemonkey.com/black');
                    wp.customize.previewer.previewUrl(decodeURIComponent(urlParams.toString()));
                } else {
                    url = url + "?url=https://rottencodemonkey.com/black";

                    console.log(url);
                    wp.customize.previewer.previewUrl(url);
                }
            })
            .catch( err => console.log( err ) );
    });
});

