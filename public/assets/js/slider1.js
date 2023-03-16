window.addEventListener('load',()=>{
    document.querySelectorAll(".rooms-item").forEach((item) => {
        let slider = {
            lineSlider: item.querySelector(".rooms-item__line"),
            left: 0,
            width: item.querySelector(".rooms-item__line>div").offsetWidth,
            count: item.querySelectorAll(".rooms-item__line>div").length,
            lineWidth:
                item.querySelector(".rooms-item__line>div").offsetWidth *
                item.querySelectorAll(".rooms-item__line>div").length,
            touchDown: null,
        };
        const moveSlider = (orient) => {
            if (orient === 1 && slider.left === 0) {
                return;
            }
            if (
                orient === -1 &&
                slider.left === -1 * (slider.count * slider.width) + slider.width
            ) {
                return;
            }

            slider.lineSlider.style.left = orient * slider.width + slider.left + "px";
            slider.left = slider.left + orient * slider.width;
        };

        item.querySelector(".arrow .left").onclick = () => {
            moveSlider(1);
        };
        item.querySelector(".arrow .right").onclick = () => {
            moveSlider(-1);
        };

        ///////////////

        item
            .querySelector(".rooms-item__slider")
            .addEventListener("touchstart", handleTouchStart, false);
        item
            .querySelector(".rooms-item__slider")
            .addEventListener("touchmove", handleTouchMove, false);
        var xDown = null;
        var yDown = null;

        function getTouches(evt) {
            return evt.touches || evt.originalEvent.touches;
        }

        function handleTouchStart(evt) {
            const firstTouch = getTouches(evt)[0];
            xDown = firstTouch.clientX;
            yDown = firstTouch.clientY;
        }

        function handleTouchMove(evt) {
            if (!xDown || !yDown) {
                return;
            }

            var xUp = evt.touches[0].clientX;
            var yUp = evt.touches[0].clientY;

            var xDiff = xDown - xUp;
            var yDiff = yDown - yUp;

            if (Math.abs(xDiff) > Math.abs(yDiff)) {
                if (xDiff > 0) {
                    moveSlider(1);
                } else {
                    moveSlider(-1);
                }
            }

            xDown = null;
            yDown = null;
        }
    });
});
