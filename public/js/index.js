(function($) {
  'use strict';
  $(function() {
    $('[data-toggle="offcanvas"]').on("click", function() {
      $('.sidebar-offcanvas').toggleClass('active')
    });
  });
})(jQuery);
(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('.sidebar');

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required

    function addActiveClass(element) {
      if (current === "") {
        //for root url
        if (element.attr('href').indexOf("index.html") !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
        }
      } else {
        //for other url
        if (element.attr('href').indexOf(current) !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
          if (element.parents('.submenu-item').length) {
            element.addClass('active');
          }
        }
      }
    }

    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      addActiveClass($this);
    })

    $('.horizontal-menu .nav li a').each(function() {
      var $this = $(this);
      addActiveClass($this);
    })

    //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });


    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if (!body.hasClass("rtl")) {
        if ($('.settings-panel .tab-content .tab-pane.scroll-wrapper').length) {
          const settingsPanelScroll = new PerfectScrollbar('.settings-panel .tab-content .tab-pane.scroll-wrapper');
        }
        if ($('.chats').length) {
          const chatsScroll = new PerfectScrollbar('.chats');
        }
        if (body.hasClass("sidebar-fixed")) {
          var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
        }
      }
    }

    $('[data-toggle="minimize"]').on("click", function() {
      if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('sidebar-icon-only');
      }
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    //fullscreen
    $("#fullscreen-button").on("click", function toggleFullScreen() {
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
          document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })
  });
})(jQuery);
(function ($) {
  'use strict';
  $(function () {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#income-expense-summary-chart-daterange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#income-expense-summary-chart-daterange').daterangepicker({
      opens: 'left',
      startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

    // Income Expenses Summary Chart with chartist line chart

    var data = {
      // A labels array that can contain any sort of values
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      // Our series array that contains series objects or in this case series data arrays
      series: [
        [505, 781, 480, 985, 410, 822, 388, 874, 350, 642, 320, 796],
        [700, 430, 725, 390, 686, 392, 757, 500, 820, 400, 962, 420]
      ]
    };

    var options = {
      height:300,
      fullWidth:true,
      axisY: {
        high: 1000,
        low: 250,
        referenceValue: 1000,
        type: Chartist.FixedScaleAxis,
        ticks: [250, 500, 750, 1000]
      },
      showArea: true,
      showPoint: false
    }
    
    var responsiveOptions = [
      ['screen and (max-width: 480px)', {
        height: 150,
        axisX: {
          labelInterpolationFnc: function (value) {
            return value;
          }
        }
      }]
    ];
    // Create a new line chart object where as first parameter we pass in a selector
    // that is resolving to our chart container element. The Second parameter
    // is the actual data object.
    new Chartist.Line('#income-expense-summary-chart', data, options, responsiveOptions);

    //Sessions by Channel doughnut chart

    var doughnutChartCanvas = $("#sessionsDoughnutChart").get(0).getContext("2d");
            var doughnutPieData = {
                datasets: [{
                    data: [55,25,20],
                    backgroundColor: [
                        '#ffca00',
                        '#38ce3c',
                        '#ff4d6b'
                    ],
                    borderColor: [
                      '#ffca00',
                      '#38ce3c',
                      '#ff4d6b'
                    ],
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Reassigned',
                    'Not Assigned',
                    'Assigned'
                ]
            };
            var doughnutPieOptions = {
                cutoutPercentage: 75,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                responsive: true,
                maintainAspectRatio: true,
                showScale: true,
                legend: {
                    display: false
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            };
            var doughnutChart = new Chart(doughnutChartCanvas, {
                type: 'doughnut',
                data: doughnutPieData,
                options: doughnutPieOptions
            });
        
          //performance indicator bar chart

          new Chartist.Bar('#performance-indicator-chart', {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'may', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [
              [30, 25, 50, 25, 50, 25, 50, 55, 20, 35, 25, 30 ],
              [25, 50, 10, 35, 30, 15, 20, 20, 30, 25, 10, 15 ],
              [45, 25, 40, 40, 20, 60, 30, 25, 50, 40, 65, 55 ]
            ]
          }, {
            stackBars: true,
            height: 200,
            axisY: {
              type: Chartist.FixedScaleAxis,
              ticks: [0, 25, 50, 75, 100]
            },
            showGridBackground: false
          },
          [
            ['screen and (max-width: 480px)', {
              height: 150,
            }]
          ]
        );

        //Pro purchase banner close
        $('.purchace-popup .popup-dismiss').on('click', function(){
          $('.purchace-popup').hide();
        })
  });
})(jQuery);