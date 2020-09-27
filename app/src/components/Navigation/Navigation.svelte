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
        padding: 20px 0;
        float: left;
        box-sizing: border-box;

        ul {
            margin: 0;
            padding: 0;

            :global > li {
                float: left;
                width: 100%;
                margin: 0px 0px 5px 0px;

                &.active a {
                    color: var(--co-brand);
                    background: #dbe1e7;
                }

                a {
                    color: var(--co-primary-text);
                    width: 100%;
                    text-transform: capitalize;
                    font-weight: 800;
                    font-size: 13px;
                    cursor: pointer;
                    transition: 0.3s;
                    position: relative;
                    height: 34px;
                    line-height: 34px;
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
                        font-size: 14px;
                        margin-top: 0px;
                        line-height: 34px;
                        font-weight: 100;
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