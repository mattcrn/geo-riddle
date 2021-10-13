<div x-data="map" class="relative w-full h-full">
    <div id="map" class=" w-full h-full z-0"></div>
    @livewire('riddle-modal')
    @livewire('find-my-giraffe')
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('map', () => ({

            userPosition: {
                latitude: 48.2118077,
                longitude: 16.4003608,
            },
            mapData: {!! $riddles !!},
            map: null,
            userMarker: null,
            geolocationOptions: {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            },
            userHasWon: {!! $userHasWon !!},

            giraffe: {
                latitude: 48.21503104526866,
                longitude: 16.34262381232978,
            },

            setUserPosition(pos) {
                const {
                    latitude,
                    longitude
                } = pos.coords;

                this.userPosition = {
                    latitude,
                    longitude
                }
            },

            init() {

                navigator.geolocation.getCurrentPosition(this.setUserPosition, (err) => {
                    console.warn('ERROR(' + err.code + '): ' + err.message);
                }, this.geolocationOptions)

                this.map = L.map('map').setView([this.userPosition.latitude, this.userPosition
                    .longitude
                ], 13);
                L.tileLayer(
                        "https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png", {
                            preferCanvas: true,
                            maxZoom: 18,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>'
                        })
                    .addTo(this.map);

                this.userMarker = L.circle([this.userPosition.latitude, this.userPosition
                    .longitude
                ], {
                    color: 'blue',
                    fillColor: 'blue',
                    fillOpacity: 0.5,
                    radius: 10
                }).addTo(this.map);

                L.circle([48.2118077, 16.4003608], {
                    color: 'green',
                    fillColor: 'green',
                    fillOpacity: 0.5,
                    radius: 10
                }).addTo(this.map);

                if (this.userHasWon) {
                    L.circle([this.giraffe.latitude, this.giraffe.longitude], {
                        color: 'black',
                        fillColor: 'black',
                        fillOpacity: 0.5,
                        radius: 10
                    }).addTo(this.map);
                }

                this.mapData.forEach(dataPoint => {
                    const circle = L.circle([dataPoint.lat, dataPoint.lng], {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5,
                        radius: 20
                    }).addTo(this.map);
                    circle.on('click', (e) => {
                        Livewire.emit('setRiddleModal', dataPoint.id, this
                            .userPosition.latitude, this.userPosition.longitude);
                    });
                });

                navigator.geolocation.watchPosition((pos) => {
                    const {
                        latitude,
                        longitude
                    } = pos.coords;
                    this.userPosition = {
                        latitude,
                        longitude
                    };
                    this.userMarker.setLatLng(L.latLng(latitude, longitude))
                }, (err) => {
                    console.warn('ERROR(' + err.code + '): ' + err.message);
                }, this.geolocationOptions);

                window.addEventListener('save-position', (e) => {
                    if (e.detail.description) {
                        Livewire.emit('savePositionData', this
                            .userPosition.latitude, this.userPosition.longitude);
                    }
                })

                window.addEventListener('find-giraffe', (e) => {
                    this.map.setView([this.giraffe.latitude, this.giraffe
                    .longitude
                ], 13);
                })

            },

        }))
    })
</script>
