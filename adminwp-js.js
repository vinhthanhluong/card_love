jQuery(document).ready(function ($) {
  const albumTheme1 = $("#couple_albums_theme1div");
  const albumTheme2 = $("#couple_albums_theme2div");
  let isFirstLoad = true;

  albumTheme1.hide();
  albumTheme2.hide();

  function resetSingleTaxonomies() {
    ["couple_albums", "couple_albums_theme1", "couple_albums_theme2"].forEach(
      function (taxonomy) {
        $("#taxonomy-" + taxonomy + ' input[type="checkbox"]').prop(
          "checked",
          false,
        );
      },
    );
  }

  function toggleAlbumTax(shouldReset = false) {
    const selected = $(
      '#taxonomy-couple_cate input[type="checkbox"]:checked',
    ).val();

    albumTheme1.toggle(selected === "23");
    albumTheme2.toggle(selected === "26");

    if (shouldReset) {
      resetSingleTaxonomies();
    }
  }

  toggleAlbumTax(false);

  //   $(document).on(
  //     "change",
  //     'input[name="tax_input[couple_cate][]"]',
  //     toggleAlbumTax,
  //   );

  $(document).on(
    "change",
    "#taxonomy-couple_cate input[type='checkbox']",
    function () {
      // Ép chỉ chọn 1
      $("#taxonomy-couple_cate input[type='checkbox']")
        .not(this)
        .prop("checked", false);

      // Sau khi DOM ổn định thì xử lý
      toggleAlbumTax(true);
    },
  );

  function singleCheckboxTaxonomy(taxonomy) {
    $(document).on(
      "change",
      "#taxonomy-" + taxonomy + ' input[type="checkbox"]',
      function () {
        $("#taxonomy-" + taxonomy + ' input[type="checkbox"]')
          .not(this)
          .prop("checked", false);
      },
    );
  }
  singleCheckboxTaxonomy("couple_cate");
  singleCheckboxTaxonomy("couple_albums");
  singleCheckboxTaxonomy("couple_albums_theme1");
  singleCheckboxTaxonomy("couple_albums_theme2");
});
