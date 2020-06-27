<style>
    :root {
    --primary-color : {{ strip_tags($color->primary) }};
    --secondary-color : {{ $color->secondary }};
    --font-color : {{ $color->font }};
    --footer-color: {{ $color->footer }};
    --background-image: url({{ $media->background }});
    --counter-image: url({{ $media->counter }});
    --quote-image: url({{ $media->quote }});
    }
</style>

<script>
function enableRadialProgress() {
    $(".radial-progress").each(function () {
        var $this = $(this),
            progPercent = $this.data('prog-percent');

        var bar = new ProgressBar.Circle(this, {
            color: '#aaa',
            strokeWidth: 3,
            trailWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            text: {

            },
            from: {
                color: '#aaa',
                width: 1
            },
            to: {
                color: '{{ $color->primary }}',
                width: 3
            },
            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(value);
                }

            }
        });

        $(this).waypoint(function () {
            bar.animate(progPercent);
        }, {
            offset: "90%"
        })

    });
}

function enableLineProgress() {

    $(".line-progress").each(function () {
        var $this = $(this),
            progPercent = $this.data('prog-percent');

        var bar = new ProgressBar.Line(this, {
            strokeWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            color: '#FEAE01',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {
                width: '100%',
                height: '100%'
            },
            text: {
                style: {

                },
            },
            from: {
                color: '#FFEA82'
            },
            to: {
                color: '#ED6A5A'
            },
            step: (state, bar) => {
                bar.setText(Math.round(bar.value() * 100) + ' %');
            }
        });

        $(this).waypoint(function () {
            bar.animate(progPercent);
        }, {
            offset: "90%"
        })

    });
}
</script>
