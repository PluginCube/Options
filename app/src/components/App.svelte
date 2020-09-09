<script>
    import { onMount } from 'svelte'
    import { activeSection, sections } from 'store'

    import Header from './Header/Header.svelte'
    import Navigation from './Navigation/Navigation.svelte'
    import Content from './Content/Content.svelte'

    onMount(() => {
        let hash = location.hash.slice(1);

        if (hash) {
            activeSection.set(hash);
        } else {
            activeSection.set(Object.keys($sections)[0]);
        }
    });
</script>

<svelte:head>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700" rel="stylesheet">
</svelte:head>

<style lang="scss">
    div {
        --cf-brand: #4c47ff;
        --cf-primary-text: #23282d;
        --cf-secondary-text: #666666;
        --cf-box-shadow: 0px 3px 7px rgba(0,0,0, 0.03);
        --cf-border-radius: 5px;
        --cf-control-border: 1px solid #eeeeee;

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
        margin-top: 20px;
        position: relative;
    }

    :global {
        #wpcontent {
            padding: 0px;
        }
        
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