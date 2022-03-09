$(document).ready(function(){

    //Передача данных в модальное окно
   
    $('#updateModal').on('show.bs.modal', function (event) {
  
        var button = $(event.relatedTarget);  
        var modal = $(this);
        var id_cheildren = button.data('id_cheildren');
        var id_groupp = button.data('id_groupp');
        var datet = button.data('datet');
        // alert(datet);
        modal.find('input[name="id_cheildren"]').val(id_cheildren);
        modal.find('input[name="datet"]').val(datet);
        modal.find('input[name="id_groupp"]').val(id_groupp);
        
    });

    $('#id_cheildren').change(function() {

        $.ajax({
            type: 'POST',
            url: 'children_date_for_inputs',
            data: ({
                id_cheildren: document.getElementById('id_cheildren').value
            }),
            dataType: 'html',
            success: function(result) {
                $('#wrap-data-private').empty().append(result);
            }
        });


    });

    $('#id_groupp').mouseleave(function() {

        $.ajax({
            type: 'POST',
            url: 'children_from_groupp',
            data: ({
                id_groupp: document.getElementById('id_groupp').value
            }),
            dataType: 'html',
            success: function(result) {
                $('#id_cheildren').empty().append(result);
            }
        });

    });

    $('#id_tabel').click(function(){
    
 //выбрать значения с формы 

            var id_cheildren=document.getElementById('id_cheildren').value;

         
            var datet=document.getElementById('datet').value;
            var status=document.getElementById('status').value;
            var id_cause=document.getElementById('id_cause').value;
            var id_groupp=document.getElementById('id_groupp').value;
           
              // передать значения в контроллер 
              $.ajax({
                type: 'POST',
                url: 'insert_tabel',
                data: ({
                    id_cheildren: id_cheildren,
                    datet: datet,
                    status: status,
                    id_cause: id_cause,
                    id_groupp: id_groupp
                }),
                dataType: 'html',
                success: function (result) {
                    $('#tabel').empty().append(result);
                }
              })
        

    });


    $('#naim_zabolevania').on('input', function() {
        
        var naim_zabolevania = document.getElementById('naim_zabolevania').value;

        $.ajax({
            type: 'POST',
            url: 'filter_med_cart',
            data: ({
               naim_zabolevania: naim_zabolevania 
            }),
            dataType: 'html',
            success: function(result) {
                $('#table-spravki').empty().append(result);
                // alert(result);
            }
        });

    });

    $('#groupp_heal_filter').on('input', function() {
        
        var groupp_heal_filter = document.getElementById('groupp_heal_filter').value;

        $.ajax({
            type: 'POST',
            url: 'filter_groupp_heal',
            data: ({
               groupp_heal_filter: groupp_heal_filter 
            }),
            dataType: 'html',
            success: function(result) {
                $('#table-grouppHeal').empty().append(result);
                // alert(result);
            }
        });

    });

    $('#med_procedure_name').on('input', function() {
        
        var med_procedure_name = document.getElementById('med_procedure_name').value;

        $.ajax({
            type: 'POST',
            url: 'filter_med_procedure',
            data: ({
               med_procedure_name: med_procedure_name 
            }),
            dataType: 'html',
            success: function(result) {
                $('#table-medProc').empty().append(result);
                // alert(result);
            }
        });

    });


//Ввод информации о родителе
    $('#updateModal_P').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Кнопка котороая открыла окно
        var recipient = button.data('cheildren') ;// Возьмем ищз кнопки дата атрибут cheildren
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_cheildren').val(recipient);
      })

      //Ввод записи в мед карту
    $('#updateModal_M').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Кнопка котороая открыла окно
        var recipient = button.data('med_cart') ;// Возьмем ищз кнопки дата атрибут cheildren
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_med_cart').val(recipient);
      })
})