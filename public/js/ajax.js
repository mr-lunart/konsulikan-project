class PollingChat {

    constructor() {
      this.idsession = 0;
      this.pollData();
    }
    // Method untuk mengubah nilai properti
    setMyProperty(value) {
        this.idsession = value;
        this.selector = document.getElementById("chat");
        this.element = document.createElement('div');
    }

    pollData() {
    
        const self = this;
        // self.element.classList.add('class','card');

        $.ajax ({
            url: 'poll',
            type: 'GET',
            
            success: function(response) {
                
                if (self.idsession <  response[(response.length) - 1]["no"]) {
                    
                    for (let i = self.idsession; i < response.length; i++) {
                        let text = document.createElement('p').innerText = response[i]["pesan"];
                        self.setMyProperty(response[i]["no"]);
                        self.element.classList.add('card');
                        self.element.innerText = text;
                        // self.element.appendChild(text);
                        self.selector.appendChild(self.element)
                        console.log(response[i]["pesan"]);
                        
                    }}},

            complete: function() {
                console.log(self.idsession);
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

