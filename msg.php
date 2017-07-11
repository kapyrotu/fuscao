    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Basic Messager - jQuery EasyUI Demo</title>
        <link rel="stylesheet" type="text/css" href="../../themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../themes/icon.css">
        <link rel="stylesheet" type="text/css" href="../demo.css">
        <script type="text/javascript" src="../../jquery.min.js"></script>
        <script type="text/javascript" src="../../jquery.easyui.min.js"></script>
    </head>
    <body>
        <h2>Basic Messager</h2>
        <p>Click on each button to see a distinct message box.</p>
        <div style="margin:20px 0;">
            <a href="#" class="easyui-linkbutton" onclick="show()">Show</a>
            <a href="#" class="easyui-linkbutton" onclick="slide()">Slide</a>
            <a href="#" class="easyui-linkbutton" onclick="fade()">Fade</a>
            <a href="#" class="easyui-linkbutton" onclick="progress()">Progress</a>
        </div>
        <script type="text/javascript">
            function show(){
                $.messager.show({
                    title:'My Title',
                    msg:'Message will be closed after 4 seconds.',
                    showType:'show'
                });
            }
            function slide(){
                $.messager.show({
                    title:'My Title',
                    msg:'Message will be closed after 5 seconds.',
                    timeout:5000,
                    showType:'slide'
                });
            }
            function fade(){
                $.messager.show({
                    title:'My Title',
                    msg:'Message never be closed.',
                    timeout:0,
                    showType:'fade'
                });
            }
            function progress(){
                var win = $.messager.progress({
                    title:'Please waiting',
                    msg:'Loading data...'
                });
                setTimeout(function(){
                    $.messager.progress('close');
                },5000)
            }
        </script>
    </body>
    </html>