<div x-data="map">
<div id="map" class=" w-80 h-80" @click="toggle">
    {{ $riddles }}
</div>
<div x-show="open">{{ $slot }}</div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('map', () => ({

            open: false,

                        toggle() {
                this.open = !this.open;
            },

            init() {
                const mymap = L.map('map').setView([51.505, -0.09], 13);
                L.tileLayer(
                        "https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png", {
                            preferCanvas: true,
                            maxZoom: 18,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>'
                        })
                    .addTo(mymap);

                const circle = L.circle([51.508, -0.11], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 50
                }).addTo(mymap);
                circle.on('click', (e) => {
                    this.toggle();
                });
            },


        }))
    })
</script>
