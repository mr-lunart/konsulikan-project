class PollingChat {

    constructor() {
        this.idsession = 0;
        this.select =document.getElementById('chat');
        this.pollData();
    }
    // Method untuk mengubah nilai properti
    setMyProperty(value) {
        this.idsession = value;
    }

    appendTeks(value) {
    this.select.appendChild(value);

    }
    pollData() {
    
        const self = this;

        $.ajax ({
            url: 'poll',
            type: 'GET',
            
            success: function(response) {
                
                if ( self.idsession <  response[(response.length) - 1]["no"] ) {
                    
                    for (let i = self.idsession; i < response.length; i++) {

                        let text = document.createTextNode(response[i]["pesan"]);
                        self.setMyProperty(response[i]['no']);
                        self.appendTeks(text);
                        console.log(response[i]["no"]+' : '+response[i]["pesan"]);
                        
                    }}},

            complete: function() {
                // Lakukan polling lagi setelah 1 detik
                setTimeout(self.pollData.bind(self), 2000);
            }
        });
    }
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
            // console.log(response);
        },

        error: function(response) {
            // console.log(response);
        }
    })
};

$("#chat-submit").click( function(){ pushData() } );
let polling = new PollingChat();