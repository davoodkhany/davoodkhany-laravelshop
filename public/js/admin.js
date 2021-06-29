/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/admin/adminlte.js":
/*!****************************************!*\
  !*** ./resources/js/admin/adminlte.js ***!
  \****************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof2(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

/*!
 * AdminLTE v3.0.0-alpha.2 (https://adminlte.io)
 * Copyright 2014-2018 Abdullah Almsaeed <abdullah@almsaeedstudio.com>
 * Licensed under MIT (https://github.com/almasaeed2010/AdminLTE/blob/master/LICENSE)
 */
(function (global, factory) {
  ( false ? 0 : _typeof2(exports)) === 'object' && "object" !== 'undefined' ? factory(exports) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
})(this, function (exports) {
  'use strict';

  var _typeof = typeof Symbol === "function" && _typeof2(Symbol.iterator) === "symbol" ? function (obj) {
    return _typeof2(obj);
  } : function (obj) {
    return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : _typeof2(obj);
  };

  var classCallCheck = function classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  };
  /**
   * --------------------------------------------
   * AdminLTE ControlSidebar.js
   * License MIT
   * --------------------------------------------
   */


  var ControlSidebar = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'ControlSidebar';
    var DATA_KEY = 'lte.control.sidebar';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Selector = {
      CONTROL_SIDEBAR: '.control-sidebar',
      DATA_TOGGLE: '[data-widget="control-sidebar"]',
      MAIN_HEADER: '.main-header'
    };
    var ClassName = {
      CONTROL_SIDEBAR_OPEN: 'control-sidebar-open',
      CONTROL_SIDEBAR_SLIDE: 'control-sidebar-slide-open'
    };
    var Default = {
      slide: true
      /**
       * Class Definition
       * ====================================================
       */

    };

    var ControlSidebar = function () {
      function ControlSidebar(element, config) {
        classCallCheck(this, ControlSidebar);
        this._element = element;
        this._config = this._getConfig(config);
      } // Public


      ControlSidebar.prototype.show = function show() {
        // Show the control sidebar
        if (this._config.slide) {
          $('body').removeClass(ClassName.CONTROL_SIDEBAR_SLIDE);
        } else {
          $('body').removeClass(ClassName.CONTROL_SIDEBAR_OPEN);
        }
      };

      ControlSidebar.prototype.collapse = function collapse() {
        // Collapse the control sidebar
        if (this._config.slide) {
          $('body').addClass(ClassName.CONTROL_SIDEBAR_SLIDE);
        } else {
          $('body').addClass(ClassName.CONTROL_SIDEBAR_OPEN);
        }
      };

      ControlSidebar.prototype.toggle = function toggle() {
        this._setMargin();

        var shouldOpen = $('body').hasClass(ClassName.CONTROL_SIDEBAR_OPEN) || $('body').hasClass(ClassName.CONTROL_SIDEBAR_SLIDE);

        if (shouldOpen) {
          // Open the control sidebar
          this.show();
        } else {
          // Close the control sidebar
          this.collapse();
        }
      }; // Private


      ControlSidebar.prototype._getConfig = function _getConfig(config) {
        return $.extend({}, Default, config);
      };

      ControlSidebar.prototype._setMargin = function _setMargin() {
        $(Selector.CONTROL_SIDEBAR).css({
          top: $(Selector.MAIN_HEADER).outerHeight()
        });
      }; // Static


      ControlSidebar._jQueryInterface = function _jQueryInterface(operation) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          if (!data) {
            data = new ControlSidebar(this, $(this).data());
            $(this).data(DATA_KEY, data);
          }

          if (data[operation] === 'undefined') {
            throw new Error(operation + ' is not a function');
          }

          data[operation]();
        });
      };

      return ControlSidebar;
    }();
    /**
     *
     * Data Api implementation
     * ====================================================
     */


    $(document).on('click', Selector.DATA_TOGGLE, function (event) {
      event.preventDefault();

      ControlSidebar._jQueryInterface.call($(this), 'toggle');
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = ControlSidebar._jQueryInterface;
    $.fn[NAME].Constructor = ControlSidebar;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return ControlSidebar._jQueryInterface;
    };

    return ControlSidebar;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE Layout.js
   * License MIT
   * --------------------------------------------
   */


  var Layout = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'Layout';
    var DATA_KEY = 'lte.layout';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Selector = {
      SIDEBAR: '.main-sidebar',
      HEADER: '.main-header',
      CONTENT: '.content-wrapper',
      CONTENT_HEADER: '.content-header',
      WRAPPER: '.wrapper',
      CONTROL_SIDEBAR: '.control-sidebar',
      LAYOUT_FIXED: '.layout-fixed',
      FOOTER: '.main-footer'
    };
    var ClassName = {
      HOLD: 'hold-transition',
      SIDEBAR: 'main-sidebar',
      LAYOUT_FIXED: 'layout-fixed'
      /**
       * Class Definition
       * ====================================================
       */

    };

    var Layout = function () {
      function Layout(element) {
        classCallCheck(this, Layout);
        this._element = element;

        this._init();
      } // Public


      Layout.prototype.fixLayoutHeight = function fixLayoutHeight() {
        var heights = {
          window: $(window).height(),
          header: $(Selector.HEADER).outerHeight(),
          footer: $(Selector.FOOTER).outerHeight(),
          sidebar: $(Selector.SIDEBAR).height()
        };

        var max = this._max(heights);

        $(Selector.CONTENT).css('min-height', max - heights.header);
        $(Selector.SIDEBAR).css('min-height', max - heights.header);
      }; // Private


      Layout.prototype._init = function _init() {
        var _this = this; // Enable transitions


        $('body').removeClass(ClassName.HOLD); // Activate layout height watcher

        this.fixLayoutHeight();
        $(Selector.SIDEBAR).on('collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu', function () {
          _this.fixLayoutHeight();
        });
        $(window).resize(function () {
          _this.fixLayoutHeight();
        });
        $('body, html').css('height', 'auto');
      };

      Layout.prototype._max = function _max(numbers) {
        // Calculate the maximum number in a list
        var max = 0;
        Object.keys(numbers).forEach(function (key) {
          if (numbers[key] > max) {
            max = numbers[key];
          }
        });
        return max;
      }; // Static


      Layout._jQueryInterface = function _jQueryInterface(operation) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          if (!data) {
            data = new Layout(this);
            $(this).data(DATA_KEY, data);
          }

          if (operation) {
            data[operation]();
          }
        });
      };

      return Layout;
    }();
    /**
     * Data API
     * ====================================================
     */


    $(window).on('load', function () {
      Layout._jQueryInterface.call($('body'));
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = Layout._jQueryInterface;
    $.fn[NAME].Constructor = Layout;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return Layout._jQueryInterface;
    };

    return Layout;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE PushMenu.js
   * License MIT
   * --------------------------------------------
   */


  var PushMenu = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'PushMenu';
    var DATA_KEY = 'lte.pushmenu';
    var EVENT_KEY = '.' + DATA_KEY;
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      COLLAPSED: 'collapsed' + EVENT_KEY,
      SHOWN: 'shown' + EVENT_KEY
    };
    var Default = {
      screenCollapseSize: 768
    };
    var Selector = {
      TOGGLE_BUTTON: '[data-widget="pushmenu"]',
      SIDEBAR_MINI: '.sidebar-mini',
      SIDEBAR_COLLAPSED: '.sidebar-collapse',
      BODY: 'body',
      OVERLAY: '#sidebar-overlay',
      WRAPPER: '.wrapper'
    };
    var ClassName = {
      SIDEBAR_OPEN: 'sidebar-open',
      COLLAPSED: 'sidebar-collapse',
      OPEN: 'sidebar-open',
      SIDEBAR_MINI: 'sidebar-mini'
      /**
       * Class Definition
       * ====================================================
       */

    };

    var PushMenu = function () {
      function PushMenu(element, options) {
        classCallCheck(this, PushMenu);
        this._element = element;
        this._options = $.extend({}, Default, options);

        if (!$(Selector.OVERLAY).length) {
          this._addOverlay();
        }
      } // Public


      PushMenu.prototype.show = function show() {
        $(Selector.BODY).addClass(ClassName.OPEN).removeClass(ClassName.COLLAPSED);
        var shownEvent = $.Event(Event.SHOWN);
        $(this._element).trigger(shownEvent);
      };

      PushMenu.prototype.collapse = function collapse() {
        $(Selector.BODY).removeClass(ClassName.OPEN).addClass(ClassName.COLLAPSED);
        var collapsedEvent = $.Event(Event.COLLAPSED);
        $(this._element).trigger(collapsedEvent);
      };

      PushMenu.prototype.toggle = function toggle() {
        var isShown = void 0;

        if ($(window).width() >= this._options.screenCollapseSize) {
          isShown = !$(Selector.BODY).hasClass(ClassName.COLLAPSED);
        } else {
          isShown = $(Selector.BODY).hasClass(ClassName.OPEN);
        }

        if (isShown) {
          this.collapse();
        } else {
          this.show();
        }
      }; // Private


      PushMenu.prototype._addOverlay = function _addOverlay() {
        var _this = this;

        var overlay = $('<div />', {
          id: 'sidebar-overlay'
        });
        overlay.on('click', function () {
          _this.collapse();
        });
        $(Selector.WRAPPER).append(overlay);
      }; // Static


      PushMenu._jQueryInterface = function _jQueryInterface(operation) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          if (!data) {
            data = new PushMenu(this);
            $(this).data(DATA_KEY, data);
          }

          if (operation) {
            data[operation]();
          }
        });
      };

      return PushMenu;
    }();
    /**
     * Data API
     * ====================================================
     */


    $(document).on('click', Selector.TOGGLE_BUTTON, function (event) {
      event.preventDefault();
      var button = event.currentTarget;

      if ($(button).data('widget') !== 'pushmenu') {
        button = $(button).closest(Selector.TOGGLE_BUTTON);
      }

      PushMenu._jQueryInterface.call($(button), 'toggle');
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = PushMenu._jQueryInterface;
    $.fn[NAME].Constructor = PushMenu;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return PushMenu._jQueryInterface;
    };

    return PushMenu;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE Treeview.js
   * License MIT
   * --------------------------------------------
   */


  var Treeview = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'Treeview';
    var DATA_KEY = 'lte.treeview';
    var EVENT_KEY = '.' + DATA_KEY;
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      SELECTED: 'selected' + EVENT_KEY,
      EXPANDED: 'expanded' + EVENT_KEY,
      COLLAPSED: 'collapsed' + EVENT_KEY,
      LOAD_DATA_API: 'load' + EVENT_KEY
    };
    var Selector = {
      LI: '.nav-item',
      LINK: '.nav-link',
      TREEVIEW_MENU: '.nav-treeview',
      OPEN: '.menu-open',
      DATA_WIDGET: '[data-widget="treeview"]'
    };
    var ClassName = {
      LI: 'nav-item',
      LINK: 'nav-link',
      TREEVIEW_MENU: 'nav-treeview',
      OPEN: 'menu-open'
    };
    var Default = {
      trigger: Selector.DATA_WIDGET + ' ' + Selector.LINK,
      animationSpeed: 300,
      accordion: true
      /**
       * Class Definition
       * ====================================================
       */

    };

    var Treeview = function () {
      function Treeview(element, config) {
        classCallCheck(this, Treeview);
        this._config = config;
        this._element = element;
      } // Public


      Treeview.prototype.init = function init() {
        this._setupListeners();
      };

      Treeview.prototype.expand = function expand(treeviewMenu, parentLi) {
        var _this = this;

        var expandedEvent = $.Event(Event.EXPANDED);

        if (this._config.accordion) {
          var openMenuLi = parentLi.siblings(Selector.OPEN).first();
          var openTreeview = openMenuLi.find(Selector.TREEVIEW_MENU).first();
          this.collapse(openTreeview, openMenuLi);
        }

        treeviewMenu.slideDown(this._config.animationSpeed, function () {
          parentLi.addClass(ClassName.OPEN);
          $(_this._element).trigger(expandedEvent);
        });
      };

      Treeview.prototype.collapse = function collapse(treeviewMenu, parentLi) {
        var _this2 = this;

        var collapsedEvent = $.Event(Event.COLLAPSED);
        treeviewMenu.slideUp(this._config.animationSpeed, function () {
          parentLi.removeClass(ClassName.OPEN);
          $(_this2._element).trigger(collapsedEvent);
          treeviewMenu.find(Selector.OPEN + ' > ' + Selector.TREEVIEW_MENU).slideUp();
          treeviewMenu.find(Selector.OPEN).removeClass(ClassName.OPEN);
        });
      };

      Treeview.prototype.toggle = function toggle(event) {
        var $relativeTarget = $(event.currentTarget);
        var treeviewMenu = $relativeTarget.next();

        if (!treeviewMenu.is(Selector.TREEVIEW_MENU)) {
          return;
        }

        event.preventDefault();
        var parentLi = $relativeTarget.parents(Selector.LI).first();
        var isOpen = parentLi.hasClass(ClassName.OPEN);

        if (isOpen) {
          this.collapse($(treeviewMenu), parentLi);
        } else {
          this.expand($(treeviewMenu), parentLi);
        }
      }; // Private


      Treeview.prototype._setupListeners = function _setupListeners() {
        var _this3 = this;

        $(document).on('click', this._config.trigger, function (event) {
          _this3.toggle(event);
        });
      }; // Static


      Treeview._jQueryInterface = function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _config = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new Treeview($(this), _config);
            $(this).data(DATA_KEY, data);
          }

          if (config === 'init') {
            data[config]();
          }
        });
      };

      return Treeview;
    }();
    /**
     * Data API
     * ====================================================
     */


    $(window).on(Event.LOAD_DATA_API, function () {
      $(Selector.DATA_WIDGET).each(function () {
        Treeview._jQueryInterface.call($(this), 'init');
      });
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = Treeview._jQueryInterface;
    $.fn[NAME].Constructor = Treeview;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return Treeview._jQueryInterface;
    };

    return Treeview;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE Widget.js
   * License MIT
   * --------------------------------------------
   */


  var Widget = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'Widget';
    var DATA_KEY = 'lte.widget';
    var EVENT_KEY = '.' + DATA_KEY;
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      EXPANDED: 'expanded' + EVENT_KEY,
      COLLAPSED: 'collapsed' + EVENT_KEY,
      REMOVED: 'removed' + EVENT_KEY
    };
    var Selector = {
      DATA_REMOVE: '[data-widget="remove"]',
      DATA_COLLAPSE: '[data-widget="collapse"]',
      CARD: '.card',
      CARD_HEADER: '.card-header',
      CARD_BODY: '.card-body',
      CARD_FOOTER: '.card-footer',
      COLLAPSED: '.collapsed-card'
    };
    var ClassName = {
      COLLAPSED: 'collapsed-card'
    };
    var Default = {
      animationSpeed: 'normal',
      collapseTrigger: Selector.DATA_COLLAPSE,
      removeTrigger: Selector.DATA_REMOVE
    };

    var Widget = function () {
      function Widget(element, settings) {
        classCallCheck(this, Widget);
        this._element = element;
        this._parent = element.parents(Selector.CARD).first();
        this._settings = $.extend({}, Default, settings);
      }

      Widget.prototype.collapse = function collapse() {
        var _this = this;

        this._parent.children(Selector.CARD_BODY + ', ' + Selector.CARD_FOOTER).slideUp(this._settings.animationSpeed, function () {
          _this._parent.addClass(ClassName.COLLAPSED);
        });

        var collapsed = $.Event(Event.COLLAPSED);

        this._element.trigger(collapsed, this._parent);
      };

      Widget.prototype.expand = function expand() {
        var _this2 = this;

        this._parent.children(Selector.CARD_BODY + ', ' + Selector.CARD_FOOTER).slideDown(this._settings.animationSpeed, function () {
          _this2._parent.removeClass(ClassName.COLLAPSED);
        });

        var expanded = $.Event(Event.EXPANDED);

        this._element.trigger(expanded, this._parent);
      };

      Widget.prototype.remove = function remove() {
        this._parent.slideUp();

        var removed = $.Event(Event.REMOVED);

        this._element.trigger(removed, this._parent);
      };

      Widget.prototype.toggle = function toggle() {
        if (this._parent.hasClass(ClassName.COLLAPSED)) {
          this.expand();
          return;
        }

        this.collapse();
      }; // Private


      Widget.prototype._init = function _init(card) {
        var _this3 = this;

        this._parent = card;
        $(this).find(this._settings.collapseTrigger).click(function () {
          _this3.toggle();
        });
        $(this).find(this._settings.removeTrigger).click(function () {
          _this3.remove();
        });
      }; // Static


      Widget._jQueryInterface = function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          if (!data) {
            data = new Widget($(this), data);
            $(this).data(DATA_KEY, typeof config === 'string' ? data : config);
          }

          if (typeof config === 'string' && config.match(/remove|toggle/)) {
            data[config]();
          } else if ((typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object') {
            data._init($(this));
          }
        });
      };

      return Widget;
    }();
    /**
     * Data API
     * ====================================================
     */


    $(document).on('click', Selector.DATA_COLLAPSE, function (event) {
      if (event) {
        event.preventDefault();
      }

      Widget._jQueryInterface.call($(this), 'toggle');
    });
    $(document).on('click', Selector.DATA_REMOVE, function (event) {
      if (event) {
        event.preventDefault();
      }

      Widget._jQueryInterface.call($(this), 'remove');
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = Widget._jQueryInterface;
    $.fn[NAME].Constructor = Widget;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return Widget._jQueryInterface;
    };

    return Widget;
  }(jQuery);

  exports.ControlSidebar = ControlSidebar;
  exports.Layout = Layout;
  exports.PushMenu = PushMenu;
  exports.Treeview = Treeview;
  exports.Widget = Widget;
  Object.defineProperty(exports, '__esModule', {
    value: true
  });
});

/***/ }),

/***/ "./resources/js/admin/dashboard.js":
/*!*****************************************!*\
  !*** ./resources/js/admin/dashboard.js ***!
  \*****************************************/
/***/ (() => {

/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/
$(function () {
  'use strict'; // Make the dashboard widgets sortable Using jquery UI

  $('.connectedSortable').sortable({
    placeholder: 'sort-highlight',
    connectWith: '.connectedSortable',
    handle: '.card-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex: 999999
  });
  $('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move'); // jQuery UI sortable for the todo list

  $('.todo-list').sortable({
    placeholder: 'sort-highlight',
    handle: '.handle',
    forcePlaceholderSize: true,
    zIndex: 999999
  }); // bootstrap WYSIHTML5 - text editor

  $('.textarea').wysihtml5();
  $('.daterange').daterangepicker({
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate: moment()
  }, function (start, end) {
    window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });
  /* jQueryKnob */

  $('.knob').knob(); // jvectormap data

  var visitorsData = {
    'US': 398,
    //USA
    'SA': 400,
    //Saudi Arabia
    'CA': 1000,
    //Canada
    'DE': 500,
    //Germany
    'FR': 760,
    //France
    'CN': 300,
    //China
    'AU': 700,
    //Australia
    'BR': 600,
    //Brazil
    'IN': 800,
    //India
    'GB': 320,
    //Great Britain
    'RU': 3000 //Russia

  }; // World map by jvectormap

  $('#world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    regionStyle: {
      initial: {
        fill: 'rgba(255, 255, 255, 0.7)',
        'fill-opacity': 1,
        stroke: 'rgba(0,0,0,.2)',
        'stroke-width': 1,
        'stroke-opacity': 1
      }
    },
    series: {
      regions: [{
        values: visitorsData,
        scale: ['#ffffff', '#0154ad'],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionLabelShow: function onRegionLabelShow(e, el, code) {
      if (typeof visitorsData[code] != 'undefined') el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
    }
  }); // Sparkline charts

  var myvalues = [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021];
  $('#sparkline-1').sparkline(myvalues, {
    type: 'line',
    lineColor: '#92c1dc',
    fillColor: '#ebf4f9',
    height: '50',
    width: '80'
  });
  myvalues = [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921];
  $('#sparkline-2').sparkline(myvalues, {
    type: 'line',
    lineColor: '#92c1dc',
    fillColor: '#ebf4f9',
    height: '50',
    width: '80'
  });
  myvalues = [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21];
  $('#sparkline-3').sparkline(myvalues, {
    type: 'line',
    lineColor: '#92c1dc',
    fillColor: '#ebf4f9',
    height: '50',
    width: '80'
  }); // The Calender

  $('#calendar').datepicker(); // SLIMSCROLL FOR CHAT WIDGET

  $('#chat-box').slimScroll({
    height: '250px'
  });
  /* Morris.js Charts */
  // Sales chart

  var area = new Morris.Area({
    element: 'revenue-chart',
    resize: true,
    data: [{
      y: '2011 Q1',
      item1: 2666,
      item2: 2666
    }, {
      y: '2011 Q2',
      item1: 2778,
      item2: 2294
    }, {
      y: '2011 Q3',
      item1: 4912,
      item2: 1969
    }, {
      y: '2011 Q4',
      item1: 3767,
      item2: 3597
    }, {
      y: '2012 Q1',
      item1: 6810,
      item2: 1914
    }, {
      y: '2012 Q2',
      item1: 5670,
      item2: 4293
    }, {
      y: '2012 Q3',
      item1: 4820,
      item2: 3795
    }, {
      y: '2012 Q4',
      item1: 15073,
      item2: 5967
    }, {
      y: '2013 Q1',
      item1: 10687,
      item2: 4460
    }, {
      y: '2013 Q2',
      item1: 8432,
      item2: 5713
    }],
    xkey: 'y',
    ykeys: ['item1', 'item2'],
    labels: ['Item 1', 'Item 2'],
    lineColors: ['#495057', '#007cff'],
    hideHover: 'auto'
  });
  var line = new Morris.Line({
    element: 'line-chart',
    resize: true,
    data: [{
      y: '2011 Q1',
      item1: 2666
    }, {
      y: '2011 Q2',
      item1: 2778
    }, {
      y: '2011 Q3',
      item1: 4912
    }, {
      y: '2011 Q4',
      item1: 3767
    }, {
      y: '2012 Q1',
      item1: 6810
    }, {
      y: '2012 Q2',
      item1: 5670
    }, {
      y: '2012 Q3',
      item1: 4820
    }, {
      y: '2012 Q4',
      item1: 15073
    }, {
      y: '2013 Q1',
      item1: 10687
    }, {
      y: '2013 Q2',
      item1: 8432
    }],
    xkey: 'y',
    ykeys: ['item1'],
    labels: ['Item 1'],
    lineColors: ['#efefef'],
    lineWidth: 2,
    hideHover: 'auto',
    gridTextColor: '#fff',
    gridStrokeWidth: 0.4,
    pointSize: 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor: '#efefef',
    gridTextFamily: 'Open Sans',
    gridTextSize: 10
  }); // Donut Chart

  var donut = new Morris.Donut({
    element: 'sales-chart',
    resize: true,
    colors: ['#007bff', '#dc3545', '#28a745'],
    data: [{
      label: 'Download Sales',
      value: 12
    }, {
      label: 'In-Store Sales',
      value: 30
    }, {
      label: 'Mail-Order Sales',
      value: 20
    }],
    hideHover: 'auto'
  }); // Fix for charts under tabs

  $('.box ul.nav a').on('shown.bs.tab', function () {
    area.redraw();
    donut.redraw();
    line.redraw();
  });
});

/***/ }),

/***/ "./resources/js/admin/demo.js":
/*!************************************!*\
  !*** ./resources/js/admin/demo.js ***!
  \************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
(function ($) {
  'use strict';

  var $sidebar = $('.control-sidebar');
  var $container = $('<div />', {
    "class": 'p-3'
  });
  $sidebar.append($container);
  var navbar_dark_skins = ['bg-primary', 'bg-info', 'bg-success', 'bg-danger'];
  var navbar_light_skins = ['bg-warning', 'bg-white', 'bg-gray-light'];
  $container.append('<h5>تنظیمات قالب</h5><hr class="mb-2"/>' + '<h6>رنگ‌های نوار ناوبری</h6>');
  var $navbar_variants = $('<div />', {
    'class': 'd-flex'
  });
  var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins);
  var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function (e) {
    var color = $(this).data('color');
    console.log('Adding ' + color);
    var $main_header = $('.main-header');
    $main_header.removeClass('navbar-dark').removeClass('navbar-light');
    navbar_all_colors.map(function (color) {
      $main_header.removeClass(color);
    });

    if (navbar_dark_skins.indexOf(color) > -1) {
      $main_header.addClass('navbar-dark');
      console.log('AND navbar-dark');
    } else {
      console.log('AND navbar-light');
      $main_header.addClass('navbar-light');
    }

    $main_header.addClass(color);
  });
  $navbar_variants.append($navbar_variants_colors);
  $container.append($navbar_variants);
  var $checkbox_container = $('<div />', {
    'class': 'mb-4'
  });
  var $navbar_border = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.main-header').hasClass('border-bottom'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('border-bottom');
    } else {
      $('.main-header').removeClass('border-bottom');
    }
  });
  $checkbox_container.append($navbar_border);
  $checkbox_container.append('<span>مرز نوار ناوبری</span>');
  $container.append($checkbox_container);
  var sidebar_colors = ['bg-primary', 'bg-warning', 'bg-info', 'bg-danger', 'bg-success'];
  var sidebar_skins = ['sidebar-dark-primary', 'sidebar-dark-warning', 'sidebar-dark-info', 'sidebar-dark-danger', 'sidebar-dark-success', 'sidebar-light-primary', 'sidebar-light-warning', 'sidebar-light-info', 'sidebar-light-danger', 'sidebar-light-success'];
  $container.append('<h6>نوار تیره</h6>');
  var $sidebar_variants = $('<div />', {
    'class': 'd-flex'
  });
  $container.append($sidebar_variants);
  $container.append(createSkinBlock(sidebar_colors, function () {
    var color = $(this).data('color');
    var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '');
    var $sidebar = $('.main-sidebar');
    sidebar_skins.map(function (skin) {
      $sidebar.removeClass(skin);
    });
    $sidebar.addClass(sidebar_class);
  }));
  $container.append('<h6>نوار روشن</h6>');
  var $sidebar_variants = $('<div />', {
    'class': 'd-flex'
  });
  $container.append($sidebar_variants);
  $container.append(createSkinBlock(sidebar_colors, function () {
    var color = $(this).data('color');
    var sidebar_class = 'sidebar-light-' + color.replace('bg-', '');
    var $sidebar = $('.main-sidebar');
    sidebar_skins.map(function (skin) {
      $sidebar.removeClass(skin);
    });
    $sidebar.addClass(sidebar_class);
  }));
  var logo_skins = navbar_all_colors;
  $container.append('<h6>رنگ برند لوگو</h6>');
  var $logo_variants = $('<div />', {
    'class': 'd-flex'
  });
  $container.append($logo_variants);
  var $clear_btn = $('<a />', {
    href: 'javascript:void(0)'
  }).text('پاک کردن').on('click', function () {
    var $logo = $('.brand-link');
    logo_skins.map(function (skin) {
      $logo.removeClass(skin);
    });
  });
  $container.append(createSkinBlock(logo_skins, function () {
    var color = $(this).data('color');
    var $logo = $('.brand-link');
    logo_skins.map(function (skin) {
      $logo.removeClass(skin);
    });
    $logo.addClass(color);
  }).append($clear_btn));

  function createSkinBlock(colors, callback) {
    var $block = $('<div />', {
      'class': 'd-flex flex-wrap mb-3'
    });
    colors.map(function (color) {
      var $color = $('<div />', {
        'class': (_typeof(color) === 'object' ? color.join(' ') : color) + ' elevation-2'
      });
      $block.append($color);
      $color.data('color', color);
      $color.css({
        width: '40px',
        height: '20px',
        borderRadius: '25px',
        marginRight: 10,
        marginBottom: 10,
        opacity: 0.8,
        cursor: 'pointer'
      });
      $color.hover(function () {
        $(this).css({
          opacity: 1
        }).removeClass('elevation-2').addClass('elevation-4');
      }, function () {
        $(this).css({
          opacity: 0.8
        }).removeClass('elevation-4').addClass('elevation-2');
      });

      if (callback) {
        $color.on('click', callback);
      }
    });
    return $block;
  }

  $('[data-widget="chat-pane-toggle"]').click(function () {
    $(this).closest('.card').toggleClass('direct-chat-contacts-open');
  });
  $('[data-toggle="tooltip"]').tooltip();

  function ConvertNumberToPersion() {
    var persian = {
      0: '۰',
      1: '۱',
      2: '۲',
      3: '۳',
      4: '۴',
      5: '۵',
      6: '۶',
      7: '۷',
      8: '۸',
      9: '۹'
    };

    function traverse(el) {
      if (el.nodeType == 3) {
        var list = el.data.match(/[0-9]/g);

        if (list != null && list.length != 0) {
          for (var i = 0; i < list.length; i++) {
            el.data = el.data.replace(list[i], persian[list[i]]);
          }
        }
      }

      for (var i = 0; i < el.childNodes.length; i++) {
        traverse(el.childNodes[i]);
      }
    }

    traverse(document.body);
  }

  ConvertNumberToPersion();
})(jQuery);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
__webpack_require__(/*! ./admin/adminlte */ "./resources/js/admin/adminlte.js");

__webpack_require__(/*! ./admin/dashboard */ "./resources/js/admin/dashboard.js");

__webpack_require__(/*! ./admin/demo */ "./resources/js/admin/demo.js");
})();

/******/ })()
;