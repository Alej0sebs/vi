<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Registro de estudiantes</title>
  <link rel="stylesheet" type="text/css" href="css/servicios.css">
  <link rel="stylesheet" href="css/nav.css" />

  <link rel="stylesheet" type="text/css" href="jquery/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="jquery/themes/icon.css">
  <link rel="stylesheet" type="text/css" href="jquery/themes/color.css">
  <link rel="stylesheet" type="text/css" href="jquery/demo/demo.css">
  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>
</head>

<body>
  <header>
    <img src="imagenes/descarga.jpg" height="auto" width="90%"></img>
  </header>

  <?php include 'nav.php'; ?>


  <p>Registro de estudiantes</p>

  <table id="dg" title="Usuarios" class="easyui-datagrid" style="width:800px;height:300px" url="Models/get_users.php"
    toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
      <tr>
        <th field="cedula" width="50">Cédula</th>
        <th field="nombre" width="50">Nombre</th>
        <th field="apellido" width="50">Apellido</th>
        <th field="direccion" width="50">Dirección</th>
        <th field="telefono" width="50">Teléfono</th>
      </tr>
    </thead>
  </table>


  <?php if (isset($_SESSION['usuario'])): ?>
    <div id="toolbar">
      <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo</a>
      <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
        onclick="editUser()">Editar</a>
      <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
        onclick="destroyUser()">Eliminar</a>
      <a href="Reportes/ConFPDF/ReporteFPDF.php" target="_blank" class="easyui-linkbutton" iconCls="icon-print"
        plain="true">
        Reporte PDF con FPDF
      </a>
      <a href="Reportes/ConJasper/ReporteJasper.php" target="_blank" class="easyui-linkbutton" iconCls="icon-print"
        plain="true">
        Reporte PDF con Jasper
      </a>
      <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true"
        onclick="reporteCedulaJasper()">
        Reporte PDF Cédula con Jasper
      </a>
      <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true"
        onclick="reporteCedulaFPDF()">
        Reporte PDF Cédula con FPDF
      </a>

    </div>
  <?php endif; ?>


  <div id="dlg" class="easyui-dialog" style="width:400px"
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
      <h3>Información del Usuario</h3>
      <div style="margin-bottom:10px">
        <input name="cedula" class="easyui-textbox" required="true" label="Cédula:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="apellido" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="direccion" class="easyui-textbox" required="true" label="Dirección:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="telefono" class="easyui-textbox" required="true" label="Teléfono:" style="width:100%">
      </div>
    </form>
  </div>

  <div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()"
      style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
      onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>

  </div>

  <script type="text/javascript">
    var url;
    function newUser() {
      $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Usuario');
      $('#fm').form('clear');
      url = 'Models/save_user.php';
    }

    function editUser() {
      var row = $('#dg').datagrid('getSelected');
      if (row) {
        $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Usuario');
        $('#fm').form('load', row);
        url = 'Models/update_user.php?cedulaVieja=' + row.cedula;
      }
    }

    function saveUser() {
      $('#fm').form('submit', {
        url: url,
        iframe: false,
        onSubmit: function () {
          return $(this).form('validate');
        },
        success: function (result) {
          var result = JSON.parse(result);
          if (result.errorMsg) {
            $.messager.show({
              title: 'Error',
              msg: result.errorMsg
            });
          } else {
            $('#dlg').dialog('close');
            $('#dg').datagrid('reload');
          }
        }
      });
    }

    function destroyUser() {
      var row = $('#dg').datagrid('getSelected');
      if (row) {
        $.messager.confirm('Confirmar', '¿Estás seguro de eliminar este usuario?', function (r) {
          if (r) {
            $.post('Models/destroy_user.php', { cedula: row.cedula }, function (result) {
              if (result.success) {
                $('#dg').datagrid('reload');
              } else {
                $.messager.show({
                  title: 'Error',
                  msg: result.errorMsg
                });
              }
            }, 'json');
          }
        });
      }
    }
    function reporteCedulaJasper() {
      var row = $('#dg').datagrid('getSelected');
      if (row) {
        var cedula = encodeURIComponent(row.cedula);
        window.open('Reportes/ConJasper/ReporteJasperCedula.php?cedula=' + cedula, '_blank');
      } else {
        $.messager.alert('Aviso', 'Por favor, seleccione un estudiante.');
      }
    }

    function reporteCedulaFPDF() {
      var row = $('#dg').datagrid('getSelected');
      if (row) {
        var cedula = encodeURIComponent(row.cedula);
        window.open('Reportes/ConFPDF/ReporteFPDFCedula.php?cedula=' + cedula, '_blank');
      } else {
        $.messager.alert('Aviso', 'Por favor, seleccione un estudiante.');
      }
    }

  </script>
</body>
<footer>
  <p>© 2025 Universidad Técnica de Ambato · FISEI</p>
</footer>

</html>