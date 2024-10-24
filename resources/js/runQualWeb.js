import { Cluster } from 'puppeteer-cluster';
import { QualWeb } from '@qualweb/core';

(async () => {
  // Launch Puppeteer Cluster with custom Puppeteer options
  const cluster = await Cluster.launch({
    concurrency: Cluster.CONCURRENCY_CONTEXT, // Choose between CONTEXT or PAGE for concurrency
    maxConcurrency: 2, // Set how many browsers can run in parallel
    puppeteerOptions: {
      headless: true, // Run in headless mode

      args: ['--no-sandbox', '--disable-setuid-sandbox',
        '--disable-dev-shm-usage',
        '--disable-gpu',            // Disable GPU acceleration if not needed
      '--window-size=1920,1080'
      ], // Add Puppeteer args if needed
    },
    timeout: 5 * 60 * 1000, // Timeout for the whole task (5 minutes)
  });

  // Create a QualWeb instance (optional: pass QualWeb options)
  const qualweb = new QualWeb({
    crawl: false, // Example of a QualWeb-specific option (disable automatic crawling)
    execute: {
      act: true, // Enable WCAG techniques execution (Act rules)
      wcag: true, // Enable WCAG 2.1 evaluation
      bestPractices: false, // Disable Best Practices evaluation
      html: true // Enable HTML validation
    }
  });

  // Define the task for each page in Puppeteer Cluster
  await cluster.task(async ({ page, data: url }) => {
    try {
      // Use QualWeb to evaluate the page
      const result = await qualweb.evaluate({ page });

      // Print the accessibility evaluation results
      console.log(`Evaluation result for ${url}:`);
      console.log(JSON.stringify(result, null, 2));
    } catch (err) {
      console.error(`Error evaluating ${url}: ${err.message}`);
    }
  });

  // Queue some URLs to evaluate
  cluster.queue('https://example.com');
  cluster.queue('https://google.com');

  // Wait for the cluster to finish and close it
  await cluster.idle();
  await cluster.close();
})();



//const { QualWeb } = require('@qualweb/core');
/*
import { QualWeb } from '@qualweb/core';

async function evaluate(url) {
    const qualweb = new QualWeb();
    try {
        await qualweb.start();

        const result = await qualweb.evaluate({ url });

        console.log(JSON.stringify(result, null, 2));

        await qualweb.stop();
    } catch (error) {
        console.error('Error while evaluating:', error);
    }
}

//const urlToEvaluate = process.argv[2]; // Take the URL from the command-line argument
const urlToEvaluate = 'https://acadevo.com'; // Take the URL from the command-line argument

if (urlToEvaluate) {
    evaluate(urlToEvaluate);
} else {
    console.error('Please provide a URL to evaluate.');
}
*/
