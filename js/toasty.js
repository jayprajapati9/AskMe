(function ($) {
  $.toasty = function (options) {
    if (!options.message) {
      throw new Error("message parameter is mandatory");
    }
    if (options.message.trim() === "") {
      throw new Error("message parameter cannot be blank");
    }
    if (!options.type) {
      throw new Error("type parameter is mandatory");
    } else {
      if (options.type == "withicon") {
        if (!options.icon) {
          throw new Error("icon parameter is mandatory");
        }
      }
    }

    var settings = $.extend(
      {
        backgroundcolor: "#333",
        fontsize: "16px",
        color: "#fff",
        iconcolor: "#FFF",
        fontfamily: "ui-sans-serif, monospace;",
        duration: 3000,
        borderradius: "4px",
        fadeduration: 300,
        position: "bottom-center",
        customcss: [],
      },
      options
    );

    var $toast;

    if (options.type == "simple") {
      $toast = $("<span>").text(settings.message);
    } else if (options.type == "withicon") {
      var $icon = $("<i>").addClass(options.icon).css({
        display: "flex",
        "align-items": "center",
        color: options.iconcolor,
      });
      var $message = $("<span>").addClass("message").text(settings.message).css({
        margin: "1.5px 20px 0px 0px",
      });
      $toast = $("<span>")
        .css({
          display: "flex",
          "align-items": "center",
          "flex-direction": "row",
          "column-gap": "10px",
        })
        .append($icon, $message);
    }

    $toast.css({
      position: "fixed",
      "max-width": "80vw",
      padding: "9px 16px",
      "background-color": settings.backgroundcolor,
      color: settings.color,
      "font-size": settings.fontsize,
      "font-family": settings.fontfamily,
      "border-radius": settings.borderradius,
      "z-index": "9999",
      "box-shadow": "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)",
    });

    if (options.customcss) {
      $toast.css(options.customcss);
    }

    if (settings.position === "bottom-center") {
      $toast.css({ bottom: "50px", left: "50%", transform: "translateX(-50%)" });
    } else if (settings.position === "top-center") {
      $toast.css({ top: "40px", left: "50%", transform: "translateX(-50%)" });
    } else if (settings.position === "top-left") {
      $toast.css({ top: "6%", left: "5%" });
    } else if (settings.position === "top-right") {
      $toast.css({ top: "6%", right: "5%" });
    } else if (settings.position === "bottom-left") {
      $toast.css({ bottom: "6%", left: "5%" });
    } else if (settings.position === "bottom-left") {
      $toast.css({ bottom: "6%", right: "5%" });
    }

    $("body").append($toast);

    $toast.fadeIn(settings.fadeduration);

    setTimeout(function () {
      $toast.fadeOut(settings.fadeduration, function () {
        $(this).remove();
      });
    }, settings.duration);
  };
})(jQuery);
