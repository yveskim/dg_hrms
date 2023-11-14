/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function ($) {
  // $("body").addClass("dark-mode");
  $(".main-header").addClass("border-bottom-0");
  $(".nav-sidebar").addClass("nav-flat");
  $(".nav-sidebar").addClass("nav-compact");
  // $(".nav-sidebar").addClass("nav-child-indent");
  $("body").addClass("layout-footer-fixed");
  $(".main-footer").addClass("text-sm");

  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  function createSkinBlock(colors, callback, noneSelected) {
    var $block = $("<select />", {
      class: noneSelected
        ? "custom-select mb-3 border-0"
        : "custom-select mb-3 text-light border-0 " +
          colors[0].replace(/accent-|navbar-/, "bg-"),
    });

    if (noneSelected) {
      var $default = $("<option />", {
        text: "None Selected",
      });

      $block.append($default);
    }

    colors.forEach(function (color) {
      var $color = $("<option />", {
        class: (typeof color === "object" ? color.join(" ") : color)
          .replace("navbar-", "bg-")
          .replace("accent-", "bg-"),
        text: capitalizeFirstLetter(
          (typeof color === "object" ? color.join(" ") : color)
            .replace(/navbar-|accent-|bg-/, "")
            .replace("-", " ")
        ),
      });

      $block.append($color);
    });
    if (callback) {
      $block.on("change", callback);
    }

    return $block;
  }

  var $sidebar = $(".control-sidebar");
  var $container = $("<div />", {
    class: "p-3 control-sidebar-content",
  });

  $sidebar.append($container);

  // Checkboxes

  $container.append('<h5>Customize Dashboard</h5><hr class="mb-2"/>');

  var $dark_mode_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("dark-mode"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("dark-mode");
    } else {
      $("body").removeClass("dark-mode");
    }
  });
  var $dark_mode_container = $("<div />", { class: "mb-4" })
    .append($dark_mode_checkbox)
    .append("<span>Dark Mode</span>");
  $container.append($dark_mode_container);

  $container.append("<h6>Header Options</h6>");
  var $header_fixed_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("layout-navbar-fixed"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("layout-navbar-fixed");
    } else {
      $("body").removeClass("layout-navbar-fixed");
    }
  });
  var $header_fixed_container = $("<div />", { class: "mb-1" })
    .append($header_fixed_checkbox)
    .append("<span>Fixed</span>");
  $container.append($header_fixed_container);

  var $dropdown_legacy_offset_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $(".main-header").hasClass("dropdown-legacy"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $(".main-header").addClass("dropdown-legacy");
    } else {
      $(".main-header").removeClass("dropdown-legacy");
    }
  });
  var $dropdown_legacy_offset_container = $("<div />", { class: "mb-1" })
    .append($dropdown_legacy_offset_checkbox)
    .append("<span>Dropdown Legacy Offset</span>");
  $container.append($dropdown_legacy_offset_container);

  var $no_border_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $(".main-header").hasClass("border-bottom-0"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $(".main-header").addClass("border-bottom-0");
    } else {
      $(".main-header").removeClass("border-bottom-0");
    }
  });
  var $no_border_container = $("<div />", { class: "mb-4" })
    .append($no_border_checkbox)
    .append("<span>No border</span>");
  $container.append($no_border_container);

  var $sidebar_mini_md_checkbox = $("<input />", {
    type: "checkbox",
    value: 1,
    checked: $("body").hasClass("sidebar-mini-md"),
    class: "mr-1",
  }).on("click", function () {
    if ($(this).is(":checked")) {
      $("body").addClass("sidebar-mini-md");
    } else {
      $("body").removeClass("sidebar-mini-md");
    }
  });

  // Color Arrays

  var navbar_dark_skins = [
    "navbar-primary",
    "navbar-secondary",
    "navbar-info",
    "navbar-success",
    "navbar-danger",
    "navbar-indigo",
    "navbar-purple",
    "navbar-pink",
    "navbar-navy",
    "navbar-lightblue",
    "navbar-teal",
    "navbar-cyan",
    "navbar-dark",
    "navbar-gray-dark",
    "navbar-gray",
  ];

  var navbar_light_skins = [
    "navbar-light",
    "navbar-warning",
    "navbar-white",
    "navbar-orange",
  ];

  var sidebar_colors = [
    "bg-primary",
    "bg-warning",
    "bg-info",
    "bg-danger",
    "bg-success",
    "bg-indigo",
    "bg-lightblue",
    "bg-navy",
    "bg-purple",
    "bg-fuchsia",
    "bg-pink",
    "bg-maroon",
    "bg-orange",
    "bg-lime",
    "bg-teal",
    "bg-olive",
  ];

  var accent_colors = [
    "accent-primary",
    "accent-warning",
    "accent-info",
    "accent-danger",
    "accent-success",
    "accent-indigo",
    "accent-lightblue",
    "accent-navy",
    "accent-purple",
    "accent-fuchsia",
    "accent-pink",
    "accent-maroon",
    "accent-orange",
    "accent-lime",
    "accent-teal",
    "accent-olive",
  ];

  var sidebar_skins = [
    "sidebar-dark-primary",
    "sidebar-dark-warning",
    "sidebar-dark-info",
    "sidebar-dark-danger",
    "sidebar-dark-success",
    "sidebar-dark-indigo",
    "sidebar-dark-lightblue",
    "sidebar-dark-navy",
    "sidebar-dark-purple",
    "sidebar-dark-fuchsia",
    "sidebar-dark-pink",
    "sidebar-dark-maroon",
    "sidebar-dark-orange",
    "sidebar-dark-lime",
    "sidebar-dark-teal",
    "sidebar-dark-olive",
    "sidebar-light-primary",
    "sidebar-light-warning",
    "sidebar-light-info",
    "sidebar-light-danger",
    "sidebar-light-success",
    "sidebar-light-indigo",
    "sidebar-light-lightblue",
    "sidebar-light-navy",
    "sidebar-light-purple",
    "sidebar-light-fuchsia",
    "sidebar-light-pink",
    "sidebar-light-maroon",
    "sidebar-light-orange",
    "sidebar-light-lime",
    "sidebar-light-teal",
    "sidebar-light-olive",
  ];

  // Navbar Variants

  $container.append("<h6>Navbar Variants</h6>");

  var $navbar_variants = $("<div />", {
    class: "d-flex",
  });
  var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins);
  var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function () {
    var color = $(this)
      .find("option:selected")
      .attr("class")
      .replace("bg-", "navbar-");
    var $main_header = $(".main-header");
    $main_header.removeClass("navbar-dark").removeClass("navbar-light");
    navbar_all_colors.forEach(function (color) {
      $main_header.removeClass(color);
    });

    $(this).removeClass().addClass("custom-select mb-3 text-light border-0 ");

    if (navbar_dark_skins.indexOf(color) > -1) {
      $main_header.addClass("navbar-dark");
      $(this).addClass(color).addClass("text-light");
    } else {
      $main_header.addClass("navbar-light");
      $(this).addClass(color);
    }

    $main_header.addClass(color);
  });

  var active_navbar_color = null;
  var $main_header = $(".main-header");
  if ($main_header.length > 0) {
    $main_header[0].classList.forEach(function (className) {
      if (
        navbar_all_colors.indexOf(className) > -1 &&
        active_navbar_color === null
      ) {
        active_navbar_color = className.replace("navbar-", "bg-");
      }
    });
  }

  $navbar_variants_colors
    .find("option." + active_navbar_color)
    .prop("selected", true);
  $navbar_variants_colors
    .removeClass()
    .addClass("custom-select mb-3 text-light border-0 ")
    .addClass(active_navbar_color);

  $navbar_variants.append($navbar_variants_colors);

  $container.append($navbar_variants);

  // Sidebar Colors

  $container.append("<h6>Accent Color Variants</h6>");
  var $accent_variants = $("<div />", {
    class: "d-flex",
  });
  $container.append($accent_variants);
  $container.append(
    createSkinBlock(
      accent_colors,
      function () {
        var color = $(this).find("option:selected").attr("class");
        var $body = $("body");
        accent_colors.forEach(function (skin) {
          $body.removeClass(skin);
        });

        var accent_color_class = color.replace("bg-", "accent-");

        $body.addClass(accent_color_class);
      },
      true
    )
  );

  var active_accent_color = null;
  $("body")[0].classList.forEach(function (className) {
    if (accent_colors.indexOf(className) > -1 && active_accent_color === null) {
      active_accent_color = className.replace("navbar-", "bg-");
    }
  });

  // $accent_variants.find('option.' + active_accent_color).prop('selected', true)
  // $accent_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_accent_color)

  $container.append("<h6>Dark Sidebar Variants</h6>");
  var $sidebar_variants_dark = $("<div />", {
    class: "d-flex",
  });
  $container.append($sidebar_variants_dark);
  var $sidebar_dark_variants = createSkinBlock(
    sidebar_colors,
    function () {
      var color = $(this).find("option:selected").attr("class");
      var sidebar_class = "sidebar-dark-" + color.replace("bg-", "");
      var $sidebar = $(".main-sidebar");
      sidebar_skins.forEach(function (skin) {
        $sidebar.removeClass(skin);
        $sidebar_light_variants
          .removeClass(skin.replace("sidebar-dark-", "bg-"))
          .removeClass("text-light");
      });

      $(this)
        .removeClass()
        .addClass("custom-select mb-3 text-light border-0")
        .addClass(color);

      $sidebar_light_variants.find("option").prop("selected", false);
      $sidebar.addClass(sidebar_class);
      $(".sidebar").removeClass("os-theme-dark").addClass("os-theme-light");
    },
    true
  );
  $container.append($sidebar_dark_variants);

  var active_sidebar_dark_color = null;
  var $main_sidebar = $(".main-sidebar");
  if ($main_sidebar.length > 0) {
    $main_sidebar[0].classList.forEach(function (className) {
      var color = className.replace("sidebar-dark-", "bg-");
      if (
        sidebar_colors.indexOf(color) > -1 &&
        active_sidebar_dark_color === null
      ) {
        active_sidebar_dark_color = color;
      }
    });
  }

  $sidebar_dark_variants
    .find("option." + active_sidebar_dark_color)
    .prop("selected", true);
  $sidebar_dark_variants
    .removeClass()
    .addClass("custom-select mb-3 text-light border-0 ")
    .addClass(active_sidebar_dark_color);

  $container.append("<h6>Light Sidebar Variants</h6>");
  var $sidebar_variants_light = $("<div />", {
    class: "d-flex",
  });
  $container.append($sidebar_variants_light);
  var $sidebar_light_variants = createSkinBlock(
    sidebar_colors,
    function () {
      var color = $(this).find("option:selected").attr("class");
      var sidebar_class = "sidebar-light-" + color.replace("bg-", "");
      var $sidebar = $(".main-sidebar");
      sidebar_skins.forEach(function (skin) {
        $sidebar.removeClass(skin);
        $sidebar_dark_variants
          .removeClass(skin.replace("sidebar-light-", "bg-"))
          .removeClass("text-light");
      });

      $(this)
        .removeClass()
        .addClass("custom-select mb-3 text-light border-0")
        .addClass(color);

      $sidebar_dark_variants.find("option").prop("selected", false);
      $sidebar.addClass(sidebar_class);
      $(".sidebar").removeClass("os-theme-light").addClass("os-theme-dark");
    },
    true
  );
  $container.append($sidebar_light_variants);

  var active_sidebar_light_color = null;
  if ($main_sidebar.length > 0) {
    $main_sidebar[0].classList.forEach(function (className) {
      var color = className.replace("sidebar-light-", "bg-");
      if (
        sidebar_colors.indexOf(color) > -1 &&
        active_sidebar_light_color === null
      ) {
        active_sidebar_light_color = color;
      }
    });
  }

  if (active_sidebar_light_color !== null) {
    $sidebar_light_variants
      .find("option." + active_sidebar_light_color)
      .prop("selected", true);
    $sidebar_light_variants
      .removeClass()
      .addClass("custom-select mb-3 text-light border-0 ")
      .addClass(active_sidebar_light_color);
  }
})(jQuery);
