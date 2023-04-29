class PollingChat {

    constructor() {
        this.idSession = document.getElementById("idSession").value;
        this.no = 0;
        this.p = document.createElement('p');
    }
    // Method untuk mengubah nilai properti
    setMyProperty(value) {
        this.no += value;
    }

    appendTeks(value) {
        document.getElementById("chat").insertAdjacentHTML('beforeend', value);

    }
    pollData() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        const self = this;

        $.ajax ({
            url: 'poll',
            type: 'GET',
            data: {idSesi:self.idSession},
            
            success: function(response) {

                var no = response[(response.length)-1]["no"]

                console.log(self.no)
                if ( self.no <  no ) {
                    
                    // for (let i = 0; i < response.length ; i++) {
                    //     self.p.innerText=response[i]["pesan"];
                    console.log(no);
                    self.setMyProperty(1);
                    //     self.appendTeks(self.p);
                    //     console.log(response[i]["no"]+' : '+response[i]["pesan"]);
                    // }
                }},

            // complete: function() {
            //     // Lakukan polling lagi setelah 2 detik
            //     setInterval(function(){self.pollData}, 5000);
            // }
        });
    }
    Timeloop()
    {
        this.fetchInterval = setInterval(() => {
            this.pollData();
        }, 3000);
    }

}


function pushData() {
    var text = $("#pesan").val()
    let idSesi = document.getElementById("idSession").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : "push",
        type : 'POST',
        data : { 
            pesan:text,
            id:idSesi
        },

        success: function(response) {
            console.log(response);
        },

        error: function(response) {
            console.log(response);
        }
    })
};

$("#chat-submit").click( function(){ pushData() } );
let polling = new PollingChat();
polling.Timeloop();