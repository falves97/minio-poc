FROM minio/minio

COPY --link --chmod=755 minio/config/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

HEALTHCHECK --interval=30s --timeout=30s --start-period=5s --retries=3 CMD curl -f http://localhost:9000/minio/health/live || exit 1

CMD ["minio", "server","/data", "--console-address", ":9001"]