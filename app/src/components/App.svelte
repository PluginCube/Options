<script>
    import { onMount } from 'svelte'

    import { activeSection, sections } from 'store'

    import Header from './Header/Header'

    import Navigation from './Navigation/Navigation'

    import Content from './Content/Content'

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
        --pco-brand: #001fff;
        --pco-primary-text: #23282d;
        --pco-secondary-text: #5d5b5b;
        --pco-box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.03);
        --pco-box-shadow-lg: 0px 0px 30px rgba(0, 0, 0, 0.05);
        --pco-border-radius: 5px;
        --pco-control-border: 1px solid #eeeeee;

        float: none;
        display: flex;
        width: 850px;
        margin: 0 auto;
        padding: 30px 0;
        position: relative;
    }

    main {
        float: left;
        width: 100%;
        margin-top: 15px;
        position: relative;
    }

    :global {
        .button-small {
            padding: 1px 9px !important;
        }

        div#wpfooter {
            display: none;
        }
    }
    
    // Load RemixIcon
    @import 'https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css';
</style>

<div>
    <Header />

    <main>
        <Navigation />
        <Content />
    </main>
</div>