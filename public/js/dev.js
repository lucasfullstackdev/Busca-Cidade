$(document).ready( () => {
    const btnMenu = $('.container-icon');
    const sidebar = $('#container-form');
    const containerResult = $('#container-result');

    const sidebarToggle = () => {
        sidebar.toggleClass('fullScreen');
        containerResult.toggleClass('fullScreen');
    }

    btnMenu.on('click', () => sidebarToggle() );

    $('.info-municipio').popover({
        container: 'body'
    });
});
