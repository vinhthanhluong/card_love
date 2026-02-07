jQuery(document).ready(function ($) {

    const albumTheme1 = $('#couple_albums_theme1div');
    const albumTheme2 = $('#couple_albums_theme2div');

    albumTheme1.hide();
    albumTheme2.hide();

    function toggleAlbumTax() {

        const selected = $('input[name="tax_input[couple_cate][]"]:checked')
            .map(function () {
                return $(this).val();
            }).get();

        if (selected.includes('23')) {
            albumTheme1.show();
            albumTheme2.hide();
        } 
        else if (selected.includes('26')) {
            albumTheme1.hide();
            albumTheme2.show();
        } 
        else {
            albumTheme1.hide();
            albumTheme2.hide();
        }
    }

    toggleAlbumTax();

    $(document).on(
        'change',
        'input[name="tax_input[couple_cate][]"]',
        toggleAlbumTax
    );

});
