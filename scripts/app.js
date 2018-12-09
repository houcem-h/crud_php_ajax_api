$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('.loader').show();

    loadData();

    // Search in client list
    $('#search').keyup(function(e) {
        var keyWord = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(keyWord) > -1);
        });
    });

});

//load data from DB function
function loadData() {
    var row;
    $.ajax({
        type: "GET",
        url: './api/client.api.php',
        data: {
            mode: 'load',
        },
        dataType: 'json',
        success: function(data) {
            // row = JSON.stringify(data);
            row = data;
        }
    }).done(function() {
        for (let i = 0; i < row.length; i++) {
            let ligne = '<tr>';
            ligne += '<td>' + row[i].id + '</td>';
            ligne += '<td>' + row[i].nom + '</td>';
            ligne += '<td>' + row[i].prenom + '</td>';
            ligne += '<td>' + row[i].datenaissance + '</td>';
            ligne += '<td>' + row[i].adresse + '</td>';
            ligne += '<td>' + row[i].tel + '</td>';
            ligne += '<td><a href="#" onclick="editClient(' + row[i].id + ')" data-toggle="modal" data-target="#editClientModal" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fas fa-user-edit"></i></a>&nbsp;';
            ligne += '<a href="#" onclick="deleteClient(' + row[i].id + ')" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fas fa-user-slash"></i></a></td>';
            ligne += '</tr>';
            $('#listClient').append(ligne);
        }
    })

    $(document).ajaxComplete(function() {
        $('.loader').hide();
    })
}

//Add new client
$('#btValider').click(function() {
    let nom = $('#nom').val();
    let prenom = $('#prenom').val();
    let dateN = $('#dateN').val();
    let adresse = $('#adresse').val();
    let tel = $('#tel').val();

    $.ajax({
        type: "POST",
        url: './api/client.api.php',
        data: {
            mode: 'insert',
            nom: nom,
            prenom: prenom,
            dataN: dateN,
            adresse: adresse,
            tel: tel,
        },
        success: function() {
            swal('Nouveau client', 'ajoutée avec succés', 'success')
                .then(() => {
                    location.reload();
                });
        }
    });

})

//Edit Client
function editClient(id) {
    $('#idEdit').val(id);
    let row;
    $.ajax({
        type: "GET",
        url: "./api/client.api.php",
        data: {
            mode: 'loadOne',
            id: id,
        },
        dataType: 'json',
        success: function(response) {
            row = response;
        }
    }).done(function() {
        $('#nomEdit').val(row.nom);
        $('#prenomEdit').val(row.prenom);
        $('#dateNEdit').val(row.datenaissance);
        $('#adresseEdit').val(row.adresse);
        $('#telEdit').val(row.tel);
    });
}

// Update Client
$('#btUpdateClient').click(function() {
    let id = $('#idEdit').val();
    let nom = $('#nomEdit').val();
    let prenom = $('#prenomEdit').val();
    let dateN = $('#dateNEdit').val();
    let adresse = $('#adresseEdit').val();
    let tel = $('#telEdit').val();

    $.ajax({
        type: "POST",
        url: './api/client.api.php',
        data: {
            id: id,
            nom: nom,
            prenom: prenom,
            dataN: dateN,
            adresse: adresse,
            tel: tel,
            mode: 'update',
        },
        success: function() {
            swal('Editer client', 'Mise à jour effectuée avec succés', 'success')
                .then(() => {
                    location.reload();
                });
        }
    });

})

// Delete Client
function deleteClient(id) {
    swal({
            title: "Etes-vous certain?",
            text: "Vous êtes sur le point de supprimer un client !",
            icon: "warning",
            buttons: ["Annuler", "Confirmer"],
        })
        .then((willCancel) => {
            if (willCancel) {
                $.ajax({
                    type: "POST",
                    url: "./api/client.api.php",
                    data: {
                        mode: 'delete',
                        id: id,
                    },
                    success: function() {
                        swal('Supprimé !', 'Compte client supprimé avec succées', 'success')
                            .then(() => {
                                location.reload();
                            });
                    },
                })
            } else {
                swal("Le compte client n'a pas été supprimée");
            }
        });
}