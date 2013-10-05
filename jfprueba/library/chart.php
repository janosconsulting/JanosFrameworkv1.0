<?php

class chart extends library implements singletoninterface
{
	// Constants
	const BASE = 'http://chart.apis.google.com/chart?';
    
   
	
	// Variables
	protected $types = array(
							'pie' => 'p',
							'line' => 'lc',
							'sparkline' => 'ls',
							'bar-horizontal' => 'bhg',
							'bar-vertical' => 'bvg',
						);

	protected $type;
	protected $title;
	protected $data = array();
	protected $size = array();
	protected $color = array();
	protected $fill = array();
	protected $labelsXY = false;
	protected $legend;
	protected $useLegend = true;
	protected $background = 'a,s,ffffff';

	protected $query = array();

	// debug
	public $debug = array();

	// Return string
	public function __toString()
	{
		return $this->display();
	}


	/** Create chart
	*/
	protected function display()
	{
		// Create query
		$this->query = array(
							'cht'	 => $this->types[strtolower($this->type)],					// Type
							'chtt'	 => $this->title,											// Title
							'chd' => 't:'.$this->data['values'],								// Data
							'chl'   => $this->data['names'],									// Data labels
							'chdl' => ( ($this->useLegend) && (is_array($this->legend)) ) ? implode('|',$this->legend) : null, // Data legend
							'chs'   => $this->size[0].'x'.$this->size[1],						// Size
							'chco'   => preg_replace( '/[#]+/', '', implode(',',$this->color)), // Color ( Remove # from string )
							'chm'   => preg_replace( '/[#]+/', '', implode('|',$this->fill)),   // Fill ( Remove # from string )
							'chxt' => ( $this->labelsXY == true) ? 'x,y' : null,				// X & Y axis labels
							'chf' => preg_replace( '/[#]+/', '', $this->background),			// Background color ( Remove # from string )
						);

		// Return chart
		return $this->img(
					GoogChart::BASE.http_build_query($this->query),
					$this->title
				);
	}

	/** Set attributes
	*/
	public function setChartAttrs( $attrs )
	{
		// debug
		$this->debug[] = $attrs;

		foreach( $attrs as $key => $value )
		{
			$this->{"set$key"}($value);
		}
	}

	/** Set type
	*/
	protected function setType( $type )
	{
		$this->type = $type;
	}


	/** Set title
	*/
	protected function setTitle( $title )
	{
		$this->title = $title;
	}


	/** Set data
	*/
	protected function setData( $data )
	{
		// Clear any previous data
		unset( $this->data );

		// Check if multiple data
		if( is_array(reset($data)) )
		{
			/** Multiple sets of data
			*/
			foreach( $data as $key => $value )
			{
				// Add data values
				$this->data['values'][] = implode( ',', $value );

				// Add data names
				$this->data['names'] = implode( '|', array_keys( $value ) );
			}
			/** Implode data correctly
			*/
			$this->data['values'] = implode('|', $this->data['values']);
			/** Create legend
			*/
			$this->legend = array_keys( $data );
		}
		else
		{
			/** Single set of data
			*/
			// Add data values
			$this->data['values'] = implode( ',', $data );

			// Add data names
			$this->data['names'] = implode( '|', array_keys( $data ) );
		}

	}

	/** Set legend
	*/
	protected function setLegend( $legend )
	{
		$this->useLegend = $legend;
	}

	/** Set size
	*/
	protected function setSize( $width, $height = null )
	{
		// check if width contains multiple params
		if(is_array( $width ) )
		{
			$this->size = $width;
		}
		else
		{
			// set each individually
			$this->size[] = $width;
			$this->size[] = $height;
		}
	}

	/** Set color
	*/
	protected function setColor( $color )
	{
		$this->color = $color;
	}

	/** Set labels
	*/
	protected function setLabelsXY( $labels )
	{
		$this->labelsXY = $labels;
	}

	/** Set fill
	*/
	protected function setFill( $fill )
	{
		// Fill must have atleast 4 parameters
		if( count( $fill ) < 4 )
		{
			// Add remaining params
			$count = count( $fill );
			for( $i = 0; $i < $count; ++$i )
				$fill[$i] = 'b,'.$fill[$i].','.$i.','.($i+1).',0';
		}
		
		$this->fill = $fill;
	}


	/** Set background
	*/
	protected function setBackground( $background )
	{
		$this->background = 'bg,s,'.$background;
	}

	/** Create img html tag
	*/
	protected function img( $url, $alt = null )
	{
		return sprintf('<img src="%s" alt="%s" style="width:%spx;height:%spx;" />', $url, $alt, $this->size[0], $this->size[1]);
	}


}