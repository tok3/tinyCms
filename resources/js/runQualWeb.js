// Import QualWeb using ES module syntax
import { QualWeb } from '@qualweb/core';

//const { QualWeb } = require('@qualweb/core');

(async () => {
  const qualweb = new QualWeb({
    puppeteerOptions: {
      headless: true,
      executablePath: '/usr/bin/google-chrome',
      args: [
        '--no-sandbox',
        '--disable-setuid-sandbox',
        '--disable-dev-shm-usage',   // Reduces shared memory usage
        '--disable-gpu',             // Disables GPU acceleration
        '--window-size=1920,1080',   // Sets a fixed window size
      ]
    }
  });


  try {
    await qualweb.start();

    const result = await qualweb.evaluate({ url: 'https://acadevo.com' });

    console.log('Evaluation result:', JSON.stringify(result, null, 2));
    await qualweb.stop();
  } catch (error) {
    console.error('Error evaluating URL:', error.message);
  }
})();

