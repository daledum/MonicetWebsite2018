#
# Generates antialiased PNG images from dot files.
#
PNGFILES := $(patsubst %.dot, %.png, $(wildcard *.dot))

.PHONY: all
all: ${PNGFILES}

%.ps: %.dot
	dot -Tps $<  -o $@

%.png: %.ps
	convert $< $@

.PHONY: clean
clean:
	rm -rf *.ps *.png
