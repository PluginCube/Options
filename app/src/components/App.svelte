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
        float: none;
        width: 800px;
        margin: 0 auto;
        position: relative;
        padding-top: 85px;
        font-family: 'Nunito', sans-serif;

        --pco-brand: #001fff;
        --pco-primary-text: #1d2327;
        --pco-secondary-text: #414850;
        --pco-tertiary-text: #8d96a2;
        --pco-primary-button-bg: #1d2327;
        --pco-primary-button-text: #fff;

        --pco-control-bg: #ffffff;

        --pco-box-shadow: 0px 6px 7px #00000008;
        --pco-box-shadow-lg: 0px 0px 30px #0000000d;
        
        --pco-border-radius: 5px;
        --pco-control-border: 0px solid #0000001a;
    }

    main {
        float: left;
        width: 100%;
        margin-top: 50px;
        position: relative;
        background: rgba(0, 0, 0, .05);
        border-radius: 5px;
    }

    :global {
        .button-small {
            padding: 1px 9px !important;
        }

        div#wpfooter {
            display: none;
        }
    }
    
    // Load fonts
    @import 'https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css';
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap');
</style>

<div>
    <Header />

    <main>
        <Navigation />
        <Content />
    </main>
</div>