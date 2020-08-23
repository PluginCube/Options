<script>
    import Header from './Header/Header.svelte'
    import Navigation from './Navigation/Navigation.svelte'
</script>

<svelte:head>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700" rel="stylesheet">
</svelte:head>

<style>
    div {
        --cf-brand: #4c47ff;
        --cf-primary-text: #23282d;
        --cf-secondary-text: #7d7d7d;

        float: none;
        display: block;
        width: 900px;
        margin: 0 auto;
        padding: 20px 0;
        position: relative;
    }

    main {
        float: left;
        width: 100%;
        margin-top: 10px;
        border-radius: 5px;
        position: relative;
    }
</style>

<div>
    <Header />
    
    <main>
        <Navigation />
    </main>
</div>