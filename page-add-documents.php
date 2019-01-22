<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1.0, width=device-width" name="viewport">
    <title>Meriko</title>
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <!-- css -->
    <link href="css/base.min.css" rel="stylesheet">
    <link href="css/tail.select-default.css" rel="stylesheet">
    <!-- favicon -->
    <!-- ... -->
    <!-- ie -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js" type="text/javascript"></script>
      <script src="js/respond.js" type="text/javascript"></script>
      <![endif]-->
</head>

<body class="avoid-fout">
    <script type="text/javascript" src="js/tail.select.min.js"></script>
    <div class="avoid-fout-indicator avoid-fout-indicator-fixed">
        <div class="progress-circular progress-circular-alt progress-circular-center">
            <div class="progress-circular-wrapper">
                <div class="progress-circular-inner">
                    <div class="progress-circular-left">
                        <div class="progress-circular-spinner"></div>
                    </div>
                    <div class="progress-circular-gap"></div>
                    <div class="progress-circular-right">
                        <div class="progress-circular-spinner"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header">
        <ul class="nav nav-list pull-left">
            <li>
                <a class="menu-toggle" href="#menu">
                    <span class="access-hide">Menu</span>
                    <span class="icon icon-menu icon-lg"></span>
                    <span class="header-close icon icon-close icon-lg"></span>
                </a>
            </li>
        </ul>
        <a class="header-logo" href="index">Meiko</a>
        <ul class="nav nav-list pull-right">
            <li>
                <a class="menu-toggle" href="#profile">
                    <span class="access-hide">User Name</span>
                    <span class="avatar avatar-sm"><img src="images/users/avatar-001.jpg"></span>
                    <span class="header-close icon icon-close icon-lg"></span>
                </a>
            </li>
        </ul>
    </header>
    <nav class="menu" id="menu">
        <?php include_once("menu.php"); ?>
    </nav>
    <nav class="menu menu-right" id="profile">
        <?php include_once("profile.php"); ?>
    </nav>
    <div class="content">
        <div class="content-heading">
            <div class="container">
                <h1 class="heading">Documentos</h1>
            </div>
        </div>
        <div class="content-inner">
            <div class="container">
                <form class="form" name="form-add-documents" id="form-add-documents" method="POST" autocomplete="off">
                    <fieldset>
                        <div class="form-group form-group-alt">
                            <div class="row">
                                <div class="col-lg-4 col-md-3 col-sm-4">
                                    <label class="form-label" for="add-document-fecha">fecha</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-8">
                                    <input type="date" id="add-document-fecha" type="text" value="2000-01-01" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-alt">
                            <div class="row">
                                <div class="col-lg-4 col-md-3 col-sm-4">
                                    <label class="form-label" for="add-document-departamento">Departamento</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-8">
                                    <select class='form-control' id='add-document-departamento' name='add-document-departamento' required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-alt">
                            <div class="row">
                                <div class="col-lg-4 col-md-3 col-sm-4">
                                    <label class="form-label" for="add-document-ciudad">Ciudad</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-8">
                                    <select class='form-control' id='add-document-ciudad' name='add-document-ciudad' required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-alt">
                            <div class="row">
                                <div class="col-lg-4 col-md-3 col-sm-4">
                                    <label class="form-label" for="add-document-etiqueta">Etiqueta</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-8">
                                    <select class='form-control' id='add-document-etiqueta' name='add-document-etiqueta' multiple required>
                                        <option>etiqueta uno</option>
                                        <option>etiqueta dos</option>
                                        <option>etiqueta tres</option>
                                        <option>cosa uno</option>
                                        <option>cosa dos</option>
                                        <option>cosa tres</option>
                                    </select>
                                    <div><span id="add-document-mensaje" class="form-help form-help-msg text-red" style="display:none;">No se pudo crear el registro<i class="form-help-icon icon icon-error"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-alt">
                                <div class="row">
                                    <div class="col-md-10 col-md-push-1">
                                        <button class="btn btn-block btn-alt waves-button waves-effect waves-light">Guardar</button>
                                    </div>
                                </div>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <?php include_once("footer.php"); ?>
    </footer>
    <script src="js/base.min.js" type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tail.select("#add-document-etiqueta", {
                multiple: true,
                search: true,
                descriptions: true,
                deselect: true,
            });
        });

        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "controlador/departamento/acciones.php?accion=1",
                success: function(data) {
                    if (data.success) {
                        $('#add-document-departamento').html(data.data).fadeIn();
                    }
                }
            });
        });
        $("#add-document-departamento").change(function() {
            $.ajax({
                type: "POST",
                url: "controlador/ciudad/acciones.php?accion=1&departamento=" + this.value,
                success: function(data) {
                    if (data.success) {
                        $('#add-document-ciudad').html(data.data).fadeIn();
                    }
                }
            });
        });
        $(function() {
            $("#form-add-documents").submit(function() {
                var Fecha_aux = document.getElementById("add-document-fecha").value.split("-");
                var Fecha = new Date(parseInt(Fecha_aux[0]), parseInt(Fecha_aux[1]), parseInt(Fecha_aux[2]));
                if (Fecha > new Date(1999, 12, 31) && Fecha < new Date()) {
                    var selectedValues = [];
                    $("#add-document-etiqueta :selected").each(function() {
                        selectedValues.push($(this).val());
                    });
                    $.ajax({
                        type: "POST",
                        url: "controlador/documento/acciones.php?accion=1&add-document-fecha=" + $("#add-document-fecha").val() + "&add-document-departamento=" + $("#add-document-departamento").val() + "&add-document-ciudad=" + $("#add-document-ciudad").val() + "&add-document-etiqueta=" + selectedValues,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(data) {
                            if (data.success) {
                                $('#add-document-mensaje').html("<span class='form-help form-help-msg text-green'>" + data.description + "<i class='form-help-icon icon icon-check'></i></span>").fadeIn();
                                $('#form-add-documents')[0].reset();
                                $('#add-document-mensaje').show(5);
                            } else {
                                $('#add-document-mensaje').html("<span class='form-help form-help-msg text-red'>" + data.description + "<i class='form-help-icon icon icon-error'></i></span>").fadeIn();
                                $('#form-add-documents')[0].reset();
                                $('#add-document-mensaje').show(5);
                            }
                        }
                    });
                } else {
                    $('#add-document-mensaje').html("<span class='form-help form-help-msg text-red'>la fecha no es mayor al año 2000 ni menor a la fecha de hoy<i class='form-help-icon icon icon-error'></i></span>").fadeIn();
                    $('#add-document-mensaje').show(5);
                }
                return false;
            });
        });
    </script>
</body>

</html>