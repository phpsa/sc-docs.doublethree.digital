require('./prism')

// Table of Contents
document.addEventListener('scroll', function () {
    let tocItems = Array.from(document.getElementsByClassName('toc')[0].children).map((child) => {
        return document.getElementById(child.children[0].id.replace('anchor-', ''))
    })
})
