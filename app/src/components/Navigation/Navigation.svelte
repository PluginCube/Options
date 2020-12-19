<script>
    import { menu } from 'store'

    import Save from './Save'

    import Section from './Item/Section'

    import External from './Item/External'

    import Separator from './Item/Separator'

    $: if (typeof $menu === 'object') menu.set(Object.values($menu))

    let types = {
        section: Section,
        external: External,
        separator: Separator,
    }

    $: items = $menu.sort(function (a, b) {
        return a.priority - b.priority;
    });
</script>

<style lang="scss">
    nav {
        width: 180px;
        margin: 0;
        float: left;
        box-sizing: border-box;

        ul {
            margin: 0;
            padding: 0;

            :global > li {
                float: left;
                width: 100%;
                margin: 0px 0px 3px 0px;

                &.active a {
                    color: var(--co-brand);
                    background: #e2e4e6;
                }

                a {
                    color: var(--co-primary-text);
                    width: 100%;
                    text-transform: capitalize;
                    font-weight: 800;
                    font-size: 13.5px;
                    cursor: pointer;
                    transition: 0.3s;
                    letter-spacing: .5px;
                    position: relative;
                    height: 36px;
                    line-height: 38px;
                    padding: 0px 12px;
                    box-sizing: border-box;
                    border-radius: var(--co-border-radius);
                    text-decoration: none;
                    float: left;
                    outline: none;
                    box-shadow: none;
                    font-family: 'Nunito', sans-serif;                    
                    i {
                        float: left;
                        margin-right: 14px;
                        font-size: 16px;
                        font-weight: 100;
                        line-height: 36px;
                    }
                }
            }
        }
    }
</style>

<nav>
    <ul>
        {#each items as item}
            <svelte:component this={types[item.type]} {...item} />
        {/each}
    </ul>

    <Save />
</nav>