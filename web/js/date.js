function addCalendar(elem) {
    elem.DatePicker({
        format:'Y-m-d',
        date: elem.val(),
        current: elem.val(),
        position: 'right',
        start: 1,
        locale: {
            days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
            daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
            daysMin: ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sá", "Do"],
            months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            weekMin: 'sm'
        },
        onBeforeShow: function(){
            elem.DatePickerSetDate(elem.val(), true);
        },
        onChange: function(formated, dates){
            if (elem.val() != formated) {
                elem.val(formated);
                elem.DatePickerHide();
            }
        }
    });
}

$(function() {
    //addCalendar($('.date_field'));
    addCalendar($('#news_article_enter_date'));
    addCalendar($('#news_article_exit_date'));
    addCalendar($('#news_article_publish_date'));
});