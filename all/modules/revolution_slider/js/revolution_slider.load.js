

(function ($) {

// Behavior to load revolution_slider
Drupal.behaviors.revolution_slider = {
  attach: function(context, settings) {
    var sliders = [];

    for (id in settings.revolution_slider.instances) {
      
      if (settings.revolution_slider.optionsets[settings.revolution_slider.instances[id]] !== undefined) {
          sliders[id] = settings.revolution_slider.optionsets[settings.revolution_slider.instances[id]];
      }
    }
    // Slider set
    for (id in sliders) {
      _revolution_slider_init(id, settings.revolution_slider.optionsets[settings.revolution_slider.instances[id]], context);
    }
  }
};

/**
 * Initialize the revolution_slider instance
 */
function _revolution_slider_init(id, optionset, context) {
  $('#' + id, context).once('revolution_slider', function() {
    
    if (optionset) {
      $(this).revolution(optionset);
    }
    else {
      $(this).revolution();
    }
  });
}

}(jQuery));
