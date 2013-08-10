<?php

use Fhaculty\Graph\GraphViz;

require __DIR__ . '/vendor/autoload.php';

$runfile = isset($argv[1]) ? $argv[1] : getcwd();

if (!is_file($runfile)) {
    $runfile = phake\resolve_runfile($runfile);
}

echo 'Loading "' . $runfile . '"...';
phake\load_runfile($runfile);

$application = builder()->get_application();
/* @var $application phake\Application */

$application->reset();

$graph = new Fhaculty\Graph\Graph();

foreach ($application->get_tasks() as $nodeName => $node) {
    /* @var $node phake\Node */
    // $nodeName = $node->get_name_full();
    $nodeVertex = $graph->createVertex($nodeName, true);

    $label = '<font color="#314B5F">' . $nodeName . '</font>';
    if ($node->get_description() !== null) {
        $label .= '<br /><font point-size="8" color="#222222"><br />' . $node->get_description() . ' </font>';
    }

    $nodeVertex->setLayout(array(
        'label' => GraphViz::raw('<' . $label . '>'),
        'fillcolor' => '#eeeeee',
        'style' => 'filled, rounded',
        'shape' => 'box',
    ));

    foreach ($node->get_dependencies() as $depName => $depNode) {
        //$depNode = $application->resolve($depName, $node);
        /* @var $depNode phake\Node */
        //$depName = $depNode->get_name_full();
        $depVertex = $graph->createVertex($depName, true);

        if (!$nodeVertex->hasEdgeTo($depVertex)) {
            $nodeVertex->createEdgeTo($depVertex);
        }

        // echo $nodeName . ' -> ' . $depName . PHP_EOL;
    }
}

$graphviz = new Fhaculty\Graph\GraphViz($graph);
$graphviz->setFormat('svg');
$graphviz->display();

echo ' OK' . PHP_EOL;

