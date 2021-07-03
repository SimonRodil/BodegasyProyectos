# Anchor.js

*By [Adrii](https://github.com/AdrianVillamayor)*

A JavaScript utility for adding anchor links to page content.

## Installation

### Manual

```js
<script src="/js/plugins/anchor.js"></script>
```

## Usage

```javascript

$('.anchor[data-anchor]').on("click", function(e) {
    e.preventDefault();

    let target = $(this).attr("data-anchor");     

    scrollToAnchor(target);
})

```

## Demo

*[CODEPEN](https://codepen.io/adrianvillamayor/pen/oNBqoxp)*

# Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

# License
[MIT](https://github.com/AdrianVillamayor/Anchor.js/blob/master/LICENSE)
