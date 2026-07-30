/** Default config */
const rangeSlider_min = {{ min }};
const rangeSlider_max = {{ max }};

// Setze die Breiten der Balken und Positionen der Handles
document.querySelector('#RangeSlider .range-slider-val-left').style.width = `${(rangeSlider_min / 10)}%`;
document.querySelector('#RangeSlider .range-slider-val-right').style.width = `${(1000 - rangeSlider_max) / 10}%`;

document.querySelector('#RangeSlider .range-slider-val-range').style.left = `${(rangeSlider_min / 10)}%`;
document.querySelector('#RangeSlider .range-slider-val-range').style.right = `${(100 - (rangeSlider_max / 10))}%`;

document.querySelector('#RangeSlider .range-slider-handle-left').style.left = `${(rangeSlider_min / 10)}%`;
document.querySelector('#RangeSlider .range-slider-handle-right').style.left = `${(rangeSlider_max / 10)}%`;

document.querySelector('#RangeSlider .range-slider-tooltip-left').style.left = `${(rangeSlider_min / 10)}%`;
document.querySelector('#RangeSlider .range-slider-tooltip-right').style.left = `${(rangeSlider_max / 10)}%`;

document.querySelector('#RangeSlider .range-slider-tooltip-left .range-slider-tooltip-text').innerText = rangeSlider_min;
document.querySelector('#RangeSlider .range-slider-tooltip-right .range-slider-tooltip-text').innerText = rangeSlider_max;

document.querySelector('#RangeSlider .range-slider-input-left').value = rangeSlider_min;
document.querySelector('#RangeSlider .range-slider-input-left').addEventListener('input', e => {
    e.target.value = Math.min(e.target.value, e.target.parentNode.childNodes[5].value - 1);
    var value = (1000 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.value) - (1000 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.min);

    var children = e.target.parentNode.childNodes[1].childNodes;
    children[1].style.width = `${value / 10}%`;
    children[5].style.left = `${value / 10}%`;
    children[7].style.left = `${value / 10}%`;
    children[11].style.left = `${value / 10}%`;

    children[11].childNodes[1].innerHTML = e.target.value;
});

document.querySelector('#RangeSlider .range-slider-input-right').value = rangeSlider_max;
document.querySelector('#RangeSlider .range-slider-input-right').addEventListener('input', e => {
    e.target.value = Math.max(e.target.value, e.target.parentNode.childNodes[3].value - 1);
    var value = (1000 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.value) - (1000 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.min);

    var children = e.target.parentNode.childNodes[1].childNodes;
    children[3].style.width = `${100 - (value / 10)}%`;
    children[5].style.right = `${100 - (value / 10)}%`;
    children[9].style.left = `${value / 10}%`;
    children[13].style.left = `${value / 10}%`;

    children[13].childNodes[1].innerHTML = e.target.value;
});