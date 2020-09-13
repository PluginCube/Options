<script>
    import { menu } from 'store'

    import Save from './Save'

    import Section from './Item/Section'

    import External from './Item/External'

    import Separator from './Item/Separator'

    let types = {
        section: Section,
        external: External,
        separator: Separator,
    }
</script>

<style lang="scss">
    nav {
        width: 185px;
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
                    color: var(--cf-brand);
                    background: #d9dfe6;
                }

                a {
                    color: var(--cf-primary-text);
                    width: 100%;
                    text-transform: capitalize;
                    font-weight: 700;
                    font-size: 14px;
                    cursor: pointer;
                    transition: 0.3s;
                    position: relative;
                    height: 34px;
                    line-height: 38px;
                    padding: 0px 12px;
                    box-sizing: border-box;
                    border-radius: var(--cf-border-radius);
                    text-decoration: none;
                    float: left;
                    font-family: Josefin Sans, sans-serif;
                    outline: none;
                    box-shadow: none;
                    letter-spacing: -0.2px;

                    i {
                        float: left;
                        margin-right: 12px;
                        font-size: 17px;
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
        {#each $menu as item}
            <svelte:component this={types[item.type]} {...item} />
        {/each}
    </ul>

    <Save />
</nav>