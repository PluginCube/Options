<script>
    import { onMount } from 'svelte'

    import { activeSection, sections } from 'store'

    import Header from './Header/Header'

    import Navigation from './Navigation/Navigation'

    import Content from './Content/Content'

    import 'remixicon/fonts/remixicon.css'

    onMount(() => {
        let hash = location.hash.slice(1)

        if (hash) {
            activeSection.set(hash)
        } else {
            activeSection.set($sections[0] ? $sections[0]['id'] : '')
        }
    })
</script>

<style lang="scss">
    div {
        --co-brand: #4c47ff;
        --co-primary-text: #23282d;
        --co-secondary-text: #666666;
        --co-box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.03);
        --co-border-radius: 5px;
        --co-control-border: 1px solid #eeeeee;

        float: none;
        display: block;
        width: 850px;
        margin: 0 auto;
        padding: 20px 0;
        position: relative;
    }

    main {
        float: left;
        width: 100%;
        margin-top: 15px;
        position: relative;
    }

    :global {
        div#wpfooter {
            display: none;
        }
    }
</style>

<div>
    <Header />

    <main>
        <Navigation />
        <Content />
    </main>
</div>