
    /** Default configuration **/

    Coloris({
        el: '.coloris',
        swatches: [
          '#264653',
          '#2a9d8f',
          '#e9c46a',
          '#f4a261',
          '#e76f51',
          '#d62828',
          '#023e8a',
          '#0077b6',
          '#0096c7',
          '#00b4d8',
          '#48cae4'
        ]
      });
  
      /** Instances **/
  
      Coloris.setInstance('.instance1', {
        theme: 'pill',
        themeMode: 'dark',
        formatToggle: true,
        swatches: [
          '#067bc2',
          '#84bcda',
          '#80e377',
          '#ecc30b',
          '#f37748',
          '#d56062'
        ]
      });
  
      Coloris.setInstance('.instance2', { theme: 'polaroid' });
  
      Coloris.setInstance('.instance3', {
        theme: 'polaroid',
        swatchesOnly: true
      });