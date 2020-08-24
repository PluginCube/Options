<script>
    import { menu } from 'store'
    
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
        width: 175px;
        margin: 0;
        padding: 20px 0;
        float: left;
        box-sizing: border-box;
    }
</style>

<nav>
    <ul>
        {#each $menu as item}
            <svelte:component this={types[item.type]} {...item}/>
        {/each}
    </ul>
</nav>