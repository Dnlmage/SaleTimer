define([
    'jquery',
    'jquery/ui'
], function ($) {
    'use strict';

    $.widget('danillozenko.saleTimer', {
        options: {
        },

        _init: function () {
            if(this.options.from && this.options.to && (new Date(this.options.to).getTime() > new Date().getTime())){
                var self = this;
                var seconds = (new Date(this.options.to).getTime() - new Date().getTime()) / 1000;
                var dates = this.calculate(seconds);
                var totalSeconds = (new Date(this.options.to).getTime() - new Date().getTime()) / 1000;
                this.updateDates(this.bindings, dates);

                setInterval(function () {
                    totalSeconds -= 1;
                    var dates = self.calculate(totalSeconds);
                    self.updateDates(self.bindings, dates);
                }, 1000);
            }
        },

        updateDates: function (node, dates) {
            $(node).find('.danillozenko-sale-timer-instance').css('display', 'block');
            $(node).find('.danillozenko-sale-timer-instance').find('.days').find('.value').text('').text(dates.days);
            $(node).find('.danillozenko-sale-timer-instance').find('.hours').find('.value').text(dates.hrs);
            $(node).find('.danillozenko-sale-timer-instance').find('.minutes').find('.value').text('').text(dates.mnts);
            $(node).find('.danillozenko-sale-timer-instance').find('.seconds').find('.value').text('').text(dates.seconds);
        },

        calculate: function (totalSeconds) {
            var seconds;
            seconds = totalSeconds;
            var days = Math.floor(seconds / (3600*24));
            seconds  -= days*3600*24;
            var hrs   = Math.floor(seconds / 3600);
            seconds  -= hrs*3600;
            var mnts = Math.floor(seconds / 60);
            seconds  -= mnts*60;
            return {'days' : days, 'hrs' : hrs, 'mnts' : mnts, 'seconds' : Math.ceil(seconds)};
        }
    });

    return $.danillozenko.saleTimer;
});
