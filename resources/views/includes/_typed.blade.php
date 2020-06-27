<script>
    var options = {
        strings: [@foreach($titles as $title)
            '{{ $title->title }}', @endforeach
        ],
        typeSpeed: 40,
        backSpeed: 40,
        loop: true
    };
    var typed = new Typed("#typed-text", options);

</script>
