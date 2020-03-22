$(document).ready( () => {
    const btnMenu = $('.container-icon');
    const sidebar = $('#sidebar');

    const sidebarToggle = () => {
        let left = sidebar.css('left');
        sidebar.css('left', left == '-300px' ? '0' : '-300px');
    }

    btnMenu.on('click', () => sidebarToggle() );


    $('.info-municipio').popover({
        container: 'body'
    });
});
