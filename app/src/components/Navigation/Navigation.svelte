<script>
    import { menu } from 'store'

    import Save from './Save.svelte'

    import Section from './Item/Section.svelte'
    import Link from './Item/Link.svelte'
    import Separator from './Item/Separator.svelte'

    let types = {
        'section': Section,
        'link': Link,
        'separator': Separator
    }
</script>

<style>
    nav {
        width: 180px;
        margin: 0;
        padding: 20px 0;
        float: left;
        box-sizing: border-box;
    }

    ul {
        margin: 0;
        padding: 0;
    }
</style>

<nav>
    <ul>
        {#each $menu as item}
            <svelte:component this={types[item.type]} {...item}/>
        {/each}
    </ul>
    
    <Save />
</nav>