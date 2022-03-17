$('#submit').click(function(e) {
    e.preventDefault();
    fecha = $('#fecha').val();


    $.ajax({
            method: "GET",
            url: "/reservas/dias/filter",
            data: { fecha: fecha }
            //data: { id: data }
        })
        .done(function(data) {
            crearTabla2(data);
        }).fail(function() {
            $("#destinofiltro").html("<p>Se ha producido un error</p>")
        })

})

function crearTabla2(data) {
    var elementos = $(data);

    if (data.length > 0) {
        $("#destinofiltro").html("");
        $("#destinofiltro").append("<table class='table table-striped table-hover'>");
        $("#destinofiltro").find("table").append("<tr>");
        $("#destinofiltro").find("tr").append("<th>Hora Inicio</th>");
        $("#destinofiltro").find("tr").append("<th>Hora Fin</th>");
        $("#destinofiltro").find("tr").append("<th>Actividad</th>");
        $("#destinofiltro").find("tr").append("<th>Reservar</th>");


        for (let index = 0; index < elementos.length; index++) {
            var i = index + 1;
            $("#destinofiltro").find("table").append("<tr>");

            var inicio = elementos[index].inicio;
            var fin = elementos[index].fin;
            var id = elementos[index].id;
            var actividad = elementos[index].activity_id;

            var enlace = "<button class='btn btn-primary btn-sm' id='R" + index + "' value ='" + id + "'> Reservar </button>";
            var fecha = crearFecha(inicio);
            $("#destinofiltro").find("tr").eq(i).append("<td><input type=datetime Sreadonly value='" + fecha + "'></td>");
            $("#destinofiltro").find("tr").eq(i).append("<td><input type=datetime readonly value='" + crearFecha(fin) + "'></td>");
            $("#destinofiltro").find("tr").eq(i).append("<td>" + actividad + "</td>");
            $("#destinofiltro").find("tr").eq(i).append("<td>" + enlace + "</td>");

        }
        $("#destinofiltro").find("button").on("click", mandarPost);


    } else {
        $("#destinofiltro").html("<p>No hay sesiones en esas fechas</p>");


    }
}

function mandarPost() {
    var idt = $(this).val();
    $.ajax({
            method: "POST",
            url: "/reservas/signDias",
            data: {
                _token: $('#token').val(),
                id: idt
            }

        })
        .done(function(data) {
            alert("Se ha inscrito en la Sesion " + idt);
        }).fail(function() {

        })
}

function crearFecha(texto) {
    var fechahora = texto.split(" ");
    var fecha = fechahora[0].split("-");
    var anio = fecha[0];
    var mes = fecha[1] - 1;
    var dia = fecha[2];
    var horas = fechahora[1].split(":");
    var hora = horas[0];
    var minutos = horas[1];
    var segundos = horas[2];
    fechaFinal = new Date(anio, mes, dia, hora, minutos, segundos);
    return fechaFinal;
}
/*$("#meses").change(function () {
    var valor = $("#meses option:selected").val();
})*/