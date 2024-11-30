ENV BREW_PREFIX=/home/linuxbrew/.linuxbrew
ENV PATH=${BREW_PREFIX}/sbin:${BREW_PREFIX}/bin:${PATH}
COPY library-scripts/homebrew-debian.sh /tmp/library-scripts/
RUN apt-get update && bash /tmp/library-scripts/homebrew-debian.sh