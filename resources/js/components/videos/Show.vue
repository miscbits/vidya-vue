<template>
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-4">
                    <p>{{video.title}}</p>
                </div>
                <div class="col-4">
                    <p>{{video.subtitle}}</p>
                </div>
                <div class="col-4">
                    <p>{{video.description}}</p>
                </div>

                <video-player
                    :sources="sources"
                    :options="options"
                ></video-player>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['video'],
        data: function() {
            return {
                sources: [
                    {
                        src: this.video.file_location, type: 'video/mp4'
                    }
                ],
                options: {
                    autoplay: false,
                    volume: 0.6,
                    poster: ''
                }
            }
        }
    }
</script>
