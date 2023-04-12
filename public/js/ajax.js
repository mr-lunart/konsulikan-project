function pollData() {
    var username = "admin" 
    $.ajax({
        url: 'poll',
        type: 'GET',
        
        success: function(response) {
            console.log(response[0]["pesan"])
            // // Proses data yang diterima dari server
            // if (data.length > 0) {
            //     // Jika ada data baru, tambahkan data tersebut ke tampilan
            //     // dan perbarui ID data terakhir yang dilihat oleh klien
            //     $('#last-seen-id').val(data[data.length - 1].id);
            //     // ...
            // }
        },
        complete: function() {
            // Lakukan polling lagi setelah 1 detik
            setTimeout(pollData, 1500);
        }
    });
}

function pushData() {
    var text = $("#pesan").val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : "push",
        type : 'POST',
        data : { pesan:text },
        success: function(response) {
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
    })
};

$("#chat-submit").click( function(){ pushData() } );
// pollData();