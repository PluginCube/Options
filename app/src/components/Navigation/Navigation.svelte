<script>
    import {menu} from '../../store'
    
    import Section from '../Navigation/Item/Section.svelte'
    import Link from '../Navigation/Item/Link.svelte'
    import Separator from '../Navigation/Item/Separator.svelte'

    let types = {
        'section': Section,
        'link': Link,
        'Separator': Separator
    }
</script>

<nav>
    <ul>
        {#each menu as item}
            <component this={types[item.type]}/>
        {/each}
    </ul>
</nav>