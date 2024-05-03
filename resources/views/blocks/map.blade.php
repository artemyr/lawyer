<div id="map" style="height: 420px"></div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const obj_map = new JCmap({
            "center": [{{$lon}}, {{$lat}}],
            "zoom": {{ $zoom }}
        });
    })
</script>
