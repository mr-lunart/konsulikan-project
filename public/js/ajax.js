// function pollData() {
//     var lastSeenId = $('#last-seen-id').val(); // Ambil ID data terakhir yang dilihat oleh klien
//     $.ajax({
//         url: '/poll-data',
//         type: 'GET',
//         data: {lastSeenId: lastSeenId},
//         dataType: 'json',
//         success: function(data) {
//             // Proses data yang diterima dari server
//             if (data.length > 0) {
//                 // Jika ada data baru, tambahkan data tersebut ke tampilan
//                 // dan perbarui ID data terakhir yang dilihat oleh klien
//                 $('#last-seen-id').val(data[data.length - 1].id);
//                 // ...
//             }
//         },
//         complete: function() {
//             // Lakukan polling lagi setelah 1 detik
//             setTimeout(pollData, 1000);
//         }
//     });
// }

function submit() {
    var text = $("#pesan").val()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : "sent",
        type : 'POST',
        data : {pesan:text},
        dataType : 'string',
        success: function(response) {
            alert(response.success);
        },
        error: function(response) {
            console.log(response.responseText);
        }
    })
};

$("#chat-submit").click( function(){ submit() } );